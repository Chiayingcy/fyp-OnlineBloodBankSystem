<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\State;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $States = State::all();

        return view('auth.register', compact('States'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
       //  $request->validate([
        //    'name' => ['required', 'string', 'max:255'],
        //    'ic' => ['required', 'string', 'ic', 'min:12', 'max:12', 'regex:/(01)[0-9]{9}/', 'unique:users'],
        //    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //    'bloodType' => ['required', 'string', 'bloodType', 'min:10 | max:11'],
        //    'gender' => ['required', 'string', 'gender', 'min:4 | max:6'],
        //    'phoneNo' => ['required', 'integer', 'phoneNo', 'regex:/(01)[0-9]{9}/','min:10 | max:11'],
        //    'address' => ['required', 'string', 'address', 'max:255'],
        //    'zipCode' => ['required', 'integer', 'zipCode', 'min:5 | max:5'],
        //    'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //]);

        $request->validate([
            'name' => 'required|min:0|max:255|',
            'ic' => 'required|min:0|max:14|unique:users',
            'age' => 'required|min:2|max:5|',
            'email' => 'required|email|unique:users',
            'bloodType' => 'required',
            'gender' => 'required|min:4|max:255|',
            'phoneNo' => 'required|numeric|min:10|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|min:0|max:5|',
            'stateID' => 'required|',
            'role' => 'required|min:1|max:1|',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $Message = [
            'required' => 'The :attribute field is required.'
            ];

        $user = User::create([
            'name' => $request->name,
            'ic' => $request->ic,
            'age' => $request->age,
            'email' => $request->email,
            'bloodType' => $request->bloodType,
            'gender' => $request->gender,
            'phoneNo' => $request->phoneNo,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'stateID' => $request->stateID,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
