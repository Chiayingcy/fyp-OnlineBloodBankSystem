<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use App\Models\BloodType;
use App\Models\HospitalsBloodBankInventory;
use Illuminate\Http\Request;

class AdminBloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodRequests = BloodRequest::with(['hospital', 'bloodTypes'])->paginate(5);

        return view('Admin.auth.bloodRequest', compact('bloodRequests'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $bloodRequest = BloodRequest::with(['hospital', 'bloodTypes'])->find($id);

        return view('Admin.auth.editBloodRequest', compact('bloodRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {

        $bloodRequest = BloodRequest::find($id);
        $bloodRequest->bloodRequestStatus = $request->bloodRequestStatus;
        $bloodRequest->reason = $request->reason;
        $bloodRequest->save();

        return redirect()->route('Admin.bloodRequest.index')->with('message', __('Blood Request Updated Successfully.'));
    }

    public function request(Request $request, $id)
    {
        $hospitals_blood_bank_inventories = HospitalsBloodBankInventory::with(['hospital', 'bloodType'])->find($id);


        return view('Admin.auth.adminSendBlood', compact('hospitals_blood_bank_inventories'));
    }

    public function sendBloodRequest(Request $request, $id)
    {

        $hospitals_blood_bank_inventories = HospitalsBloodBankInventory::find($id);
        $hospitals_blood_bank_inventories->requireBloodQuantity = $request->requireBloodQuantity;
        $hospitals_blood_bank_inventories->save();

        return redirect()->route('Admin.viewBloodBankInventory')->with('message', __('Blood Request Send Successfully.'));
    }

}
