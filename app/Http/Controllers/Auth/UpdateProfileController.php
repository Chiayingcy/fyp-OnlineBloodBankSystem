<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\BloodType;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;

class UpdateProfileController extends Controller
{
    //
    public function index()
    {
        $States = State::all();

        $stateName = State::find(auth()->user()->stateID);

        $bloodType = BloodType::find(auth()->user()->bloodType);

        //$user = Crypt::decrypt(User::find(auth()->user()->ic));


        return view('auth.profile', compact('States', 'stateName',  'bloodType'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'phoneNo' => 'required|numeric|min:10|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|min:0|max:5|',
            'stateID' => 'required|',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $user = Auth::user();
        $user->email = $request['email'];
        $user->phoneNo = $request['phoneNo'];
        $user->address = $request['address'];
        $user->zipCode = $request['zipCode'];
        $user->stateID = $request['stateID'];
        $user->password = bcrypt($request['password']);

        $user->save();

        return redirect()->route('profile')->with('message', 'Profile saved successfully');
    }

    
}
