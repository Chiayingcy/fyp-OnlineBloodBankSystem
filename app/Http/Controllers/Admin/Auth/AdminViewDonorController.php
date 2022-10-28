<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateDonorInformationRequest;
use App\Models\Appointment;
use App\Models\BloodType;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminViewDonorController extends Controller
{
    //
    public function viewDonarList()
    {
        $User = User::join('blood_types', 'users.bloodType', '=', 'blood_types.id')
                ->select('users.id','users.name', 'users.ic', 'users.age', 'users.email','blood_types.bloodType','users.gender', 'users.phoneNo',)
                ->sortable()
                ->paginate(5);

        return view("Admin.auth.viewDonorList", compact('User'));
    }

    public function searchDonor()
    {
        $searchDonor = $_GET['search'];
        
        $User = User::where('name', 'LIKE', '%'.$searchDonor.'%')->paginate(5);
        


        return view('Admin.auth.searchDonor', compact('User'));
    }

    public function create()
    {
        $States = State::all();
        $bloodType = BloodType::all();

        return view('Admin.auth.addDonor', compact('States'), compact('bloodType'));
    }

    public function addDonor(Request $request)
    {
        $States = State::all();
        $bloodType = BloodType::all();

        $request->validate([
            'name' => 'required|min:0|max:255|',
            'ic' => 'required|min:0|max:12|unique:users',
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

        return redirect()->route('Admin.addDonor.create', compact('States', 'bloodType', 'addDonor'))->with('message', 'New Donor Added Successfully!');
    }

    public function editViewDonor($id)
    {
        $User = User::find($id);

        $States = State::all();

        $stateName = State::find($User->stateID);



        return view('Admin.auth.editDonor', compact('User', 'States', 'stateName'))->with('User', $User);
    }

    public function editUpdateDonorInformation(UpdateDonorInformationRequest $request, $id)
    {
        $User = User::find($id);

        $User->email = $request->input('email');
        $User->phoneNo = $request->input('phoneNo');
        $User->address = $request->input('address');
        $User->zipCode = $request->input('zipCode');
        $User->stateID = $request->input('stateID');

        $User->update($request->all());
        

        return redirect()->route('Admin.viewDonorList')->with('message', 'Donor Information updated successfully');
    }

    public function AppointmentsDonor(Request $request)
    {
        $appointment = Appointment::with('donor', 'hospital')->paginate(5);

        return view('Admin.auth.Appointments.index', compact('appointment'));
    }

    public function AppointmentsDonorDetail($id)
    {

        $appointment = Appointment::with('donor', 'hospital')->find($id);

        return view('Admin.auth.Appointments.edit', compact('appointment'));
    }

    public function AppointmentsDonorDetailupdate(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->appointmentStatus = $request->appointmentStatus;
        $appointment->reason = $request->reason;
        $appointment->save();

        return redirect()->route('Admin.AppointmentsDonor')->with('message', 'Appointment updated successfully');
    }
}
