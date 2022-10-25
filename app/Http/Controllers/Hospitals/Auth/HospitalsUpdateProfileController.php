<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\HospitalsUpdateProfileRequest;
use Illuminate\Http\Request;

use App\Models\State;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class HospitalsUpdateProfileController extends Controller
{
     //
     public function index()
     {
        $States = State::all();
 
        $stateName = State::find(Auth::guard('Hospitals')->user()->stateID);
 
 
        return view('Hospitals.auth.hprofile', compact('States', 'stateName'));
     }
 
     public function update(HospitalsUpdateProfileRequest $request)
     {
        $request->validate([
        'email' => 'required|email',
        'hospitalLink' => 'required|',
        'phoneNo' => 'required|min:9|max:11|regex:/^\(?([0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/|',
        'address' => 'required|min:5|max:255|',
        'zipCode' => 'required|min:0|max:5|',
        'stateID' => 'required',
        'password' => ['required', 'confirmed', 
                        Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                    ],
        ]);

        $hospitals = Auth::guard('Hospitals')->user();
        $hospitals->email = $request['email'];
        $hospitals->hospitalLink = $request['hospitalLink'];
        $hospitals->phoneNo = $request['phoneNo'];
        $hospitals->address = $request['address'];
        $hospitals->zipCode = $request['zipCode'];
        $hospitals->stateID = $request['stateID'];
        $hospitals->password = bcrypt($request['password']);

        $hospitals->save();

        return redirect()->route('Hospitals.hprofile')->with('message', 'Profile saved successfully');
     }
}
