<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\HospitalsBloodBankInventory;
use Illuminate\Http\Request;

class AdminViewBloodBankInventoryController extends Controller
{
    //
    public function viewBloodBankInventory()
    {
       $hospitals = HospitalsBloodBankInventory::join('hospitals', 'hospitals_blood_bank_inventories.hospitalID', '=', 'hospitals.id')
                    ->join('blood_types', 'hospitals_blood_bank_inventories.bloodType', '=', 'blood_types.id')
                    ->select('hospitals_blood_bank_inventories.*','hospitals.hospitalName', 'blood_types.bloodType')
                    ->get();

        return view("Admin.auth.viewBloodBankInventory", compact('hospitals'));

    }
}
