<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hospitals;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredHospitalsController extends Controller
{
    /**
     * Display the Hospitals registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Hospitals.auth.register');
    }

    /**
     * Handle an incoming Hospitals registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'hospitalName' => 'required|min:0|max:255|',
            'hospitalID' => 'required|min:0|max:12|unique:hospitals',
            'email' => 'required|email|unique:hospitals',
            'phoneNo' => 'required|min:9|max:11|regex:/^\(?([0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|min:0|max:5|',
            'state' => 'required|min:5|max:20|',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $Message = [
            'required' => 'The :attribute field is required.'
            ];

        $hospitals = Hospitals::create([
            'hospitalName' => $request->hospitalName,
            'hospitalID' => $request->hospitalID,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'state' => $request->state,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($hospitals));

        Auth::login($hospitals);

        return redirect(RouteServiceProvider::HOSPITALS_HOME);
    }
}
