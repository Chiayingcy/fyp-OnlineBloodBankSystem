<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hospitals;
use App\Models\State;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminViewHospitalsController extends Controller
{
    //
    public function viewHospitalsList()
    {
        $Hospitals = Hospitals::all();
        $Hospitals = Hospitals::sortable()->paginate(5);

        return view("Admin.auth.viewHospitalsList", compact('Hospitals'));
    }

    public function searchHospitals()
    {
        $searchHospitals = $_GET['search'];
        
        $Hospitals = Hospitals::where('hospitalName', 'LIKE', '%'.$searchHospitals.'%')->paginate(5);
        


        return view('Admin.auth.searchHospitals', compact('Hospitals'));
    }

    public function create()
    {
        $States = State::all();

        return view('Admin.auth.addHospital', compact('States'));
    }

    public function addHospital(Request $request)
    {
        $States = State::all();

        $request->validate([
            'hospitalName' => 'required|min:0|max:255|',
            'email' => 'required|email|unique:hospitals',
            'hospitalLink' => 'required|',
            'phoneNo' => 'required|min:9|max:11|regex:/^\(?([0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/|',
            'address' => 'required|min:5|max:255|',
            'zipCode' => 'required|min:0|max:5|',
            'stateID' => 'required',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $message = [
            'required' => 'The :attribute field is required.'
            ];

        $addHospital = Hospitals::create([
            'hospitalName' => $request->hospitalName,
            'email' => $request->email,
            'hospitalLink' => $request->hospitalLink,
            'phoneNo' => $request->phoneNo,
            'address' => $request->address,
            'zipCode' => $request->zipCode,
            'stateID' => $request->stateID,
            'password' => Hash::make($request->password),
        ]);

        $addHospital->save();

        return redirect()->route('Admin.addHospital.create' ,compact('States', 'addHospital'))->with('message', 'New Hospital Added Successfully!');
    }
}
