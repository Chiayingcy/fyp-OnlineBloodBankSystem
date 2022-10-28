<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\User;
use App\Models\State;
use App\Models\Hospitals;

use App\Models\userTest;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        $bloodType = BloodType::all();

        return view('auth.register', compact('States'), compact('bloodType'));
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
            'name' => 'required|min:0|max:255|',
            'ic' => 'required|max:12|unique:users',
            'age' => 'required|min:2|max:5|',
            'email' => 'required|email|unique:users',
            'bloodType' => 'required',
            'gender' => 'required|min:4|max:255|',
            'phoneNo' => 'required|numeric|min:10|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|min:0|max:5|',
            'stateID' => 'required|',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $Message = [
            'required' => 'The :attribute field is required.'
            ];

        $user = User::create([
            'name' => $request->name,
            //'ic' => substr_replace($request->ic, 'xxxxxx', 3, 8),
            //'ic' => Crypt::encrypt($request->ic),
            //'ic' => $request->ic,
            'ic' => base64_encode($request->ic),
            'age' => $request->age,
            'email' => $request->email,
            'bloodType' => $request->bloodType,
            'gender' => $request->gender,
            'phoneNo' => $request->phoneNo,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'stateID' => $request->stateID,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    public function search()
    {
        $searchHospital = $_GET['search'];
        $Hospitals = Hospitals::where('hospitalName', 'LIKE', '%'.$searchHospital.'%')->get();


        return view('auth.searchHospital', compact('Hospitals'));
    }
}
