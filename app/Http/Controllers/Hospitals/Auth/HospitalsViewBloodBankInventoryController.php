<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodType;
use App\Models\Hospitals;
use App\Models\HospitalsBloodBankInventory;
use Illuminate\Support\Facades\Auth;

class HospitalsViewBloodBankInventoryController extends Controller
{
    //
    public function viewBloodBankInventory()
    {
        $hospitalID = Auth::guard('Hospitals')->user()->id;

        $hospitals = HospitalsBloodBankInventory::where('hospitalID', $hospitalID)
                    ->join('hospitals', 'hospitals_blood_bank_inventories.hospitalID', '=', 'hospitals.id')
                    ->join('blood_types', 'hospitals_blood_bank_inventories.bloodType', '=', 'blood_types.id')
                    ->select('hospitals_blood_bank_inventories.*', 'blood_types.bloodType')
                    ->get();

        return view("Hospitals.auth.viewBloodBankInventory", compact('hospitalID','hospitals'));

    }

    public function create()
    {
        $hospitalId = Auth::guard('Hospitals')->user()->id;


        $hospitals_blood_bank_inventories = HospitalsBloodBankInventory::where('hospitalID', $hospitalId)->pluck('bloodType')->toArray();
        $bloodType = BloodType::whereNotIn('id', $hospitals_blood_bank_inventories)->get();

        return view('Hospitals.auth.addBloodBankInventory', compact('bloodType'));
    }

    public function addBlood(Request $request)
    {
        $bloodType = BloodType::all();

        $request->validate([
            'hospitalID' => 'required|min:0|max:255',
            'bloodType' => 'required',
            'bloodQuantity' => 'required|numeric|min:1',

        ]);

        $addBlood = HospitalsBloodBankInventory::create([
            'hospitalID' => $request->hospitalID,
            'bloodType' => $request->bloodType,
            'bloodQuantity' => $request->bloodQuantity,
        ]);

        $addBlood->save();

        return redirect()->route('Hospitals.viewBloodBankInventory', compact('bloodType', 'addBlood'))->with('message', 'Blood Type in Blood Bank Inventory Added Successfully!');
    }

    public function editUpdateViewBloodBankInventory($id)
    {
        $hospitals = HospitalsBloodBankInventory::find($id);

        $bloodType= BloodType::find($hospitals->bloodType);


        return view('Hospitals.auth.editBloodBankInventory', compact('hospitals', 'bloodType'));
    }

    public function editUpdateViewBloodBankInventoryInformation(Request $request, $id)
    {
        $hospitals = HospitalsBloodBankInventory::find($id);

        $hospitals->bloodQuantity = $request->input('bloodQuantity');

        $hospitals->update($request->all());
        

        return redirect()->route('Hospitals.viewBloodBankInventory')->with('message', 'Blood Type Quantity in Blood Bank Inventory updated successfully');
    }



}
