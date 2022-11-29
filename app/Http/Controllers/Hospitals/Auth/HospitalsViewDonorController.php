<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\BloodType;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HospitalsViewDonorController extends Controller
{
    //
    public function viewDonarList()
    {
        $User = User::join('blood_types', 'users.bloodType', '=', 'blood_types.id')
                ->select('users.id','users.name', 'users.ic', 'users.age', 'users.email','blood_types.bloodType','users.gender', 'users.phoneNo',)
                ->sortable()
                ->paginate(5);

        return view("Hospitals.auth.viewDonorList", compact('User'));
    }

    public function searchDonor()
    {
        $searchDonor = $_GET['search'];
        
        $User = User::where('name', 'LIKE', '%'.$searchDonor.'%')
                    ->join('blood_types', 'users.bloodType', '=', 'blood_types.id')
                    ->select('users.id','users.name', 'users.ic', 'users.age', 'users.email','blood_types.bloodType','users.gender', 'users.phoneNo',)
                    ->sortable()
                    ->paginate(5);
        
        return view('Hospitals.auth.searchDonor', compact('User'));
    }

    public function create()
    {
        $States = State::all();
        $bloodType = BloodType::all();

        return view('Hospitals.auth.addDonor', compact('States'), compact('bloodType'));
    }

    public function addDonor(Request $request)
    {
        $States = State::all();
        $bloodType = BloodType::all();

        $request->validate([
            'name' => 'required|min:0|max:255|',
            'ic' => 'required|size:12|unique:users',
            'age' => 'required|min:2|max:5|',
            'email' => 'required|email|unique:users',
            'bloodType' => 'required',
            'gender' => 'required|min:4|max:255|',
            'phoneNo' => 'required|numeric|min:10|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|size:5|max:5|',
            'stateID' => 'required|',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $message = [
            'required' => 'The :attribute field is required.'
            ];

        $addDonor = User::create([
            'name' => $request->name,
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

        $addDonor->save();

        return view('Hospitals.auth.addDonor', compact('States', 'bloodType', 'addDonor'))->with('message', 'New Donor Added Successfully!');
    }

    
}
