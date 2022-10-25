<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateDonorInformationRequest;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class HospitalsEditDonorController extends Controller
{
    public function editViewDonor($id)
    {
        $User = User::find($id);

        $States = State::all();

        $stateName = State::find($User->stateID);



        return view('Hospitals.auth.editDonor', compact('User', 'States', 'stateName'))->with('User', $User);
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
        

        return redirect()->route('Hospitals.viewDonorList')->with('message', 'Donor Information updated successfully');
    }
}
