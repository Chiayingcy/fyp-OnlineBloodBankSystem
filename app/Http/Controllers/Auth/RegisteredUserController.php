<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('auth.register');
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'ic' => ['required|regex:/(01)[0-9]{9}/', 'numeric', 'ic', 'min:12 | max:12', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'bloodType' => ['required', 'string', 'bloodType', 'min:10 | max:11'],
            'gender' => ['required', 'string', 'gender', 'min:4 | max:6'],
            'phoneNo' => ['required', 'regex:/(01)[0-9]{9}/', 'numeric', 'phoneNo', 'min:10 | max:11'],
            'address' => ['required', 'string', 'address', 'max:255'],
            'zipCode' => ['required', 'numeric', 'zipCode', 'min:5 | max:5'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'ic' => $request->ic,
            'email' => $request->email,
            'bloodType' => $request->bloodType,
            'gender' => $request->gender,
            'phoneNo' => $request->phoneNo,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
