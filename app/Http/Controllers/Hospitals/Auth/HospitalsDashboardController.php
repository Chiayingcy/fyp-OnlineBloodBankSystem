<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BloodRequest;
use App\Models\BloodType;
use App\Models\HospitalsBloodBankInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HospitalsDashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalId = Auth::guard('Hospitals')->user()->id;

        $EmergencyBloodPending  = BloodRequest::where('bloodRequirement', 1)->where('hospitalID', $hospitalId)->where('bloodRequestStatus', 0)->count();
        $EmergencyBloodSuccess  = BloodRequest::where('bloodRequirement', 1)->where('hospitalID', $hospitalId)->where('bloodRequestStatus', 1)->count();
        $EmergencyBloodFail  = BloodRequest::where('bloodRequirement', 1)->where('hospitalID', $hospitalId)->where('bloodRequestStatus', 2)->count();
        $RequestBloodPending = BloodRequest::where('bloodRequirement', 0)->where('hospitalID', $hospitalId)->where('bloodRequestStatus', 0)->count();
        $RequestBloodSuccess = BloodRequest::where('bloodRequirement', 0)->where('hospitalID', $hospitalId)->where('bloodRequestStatus', 1)->count();
        $RequestBloodFail = BloodRequest::where('bloodRequirement', 0)->where('hospitalID', $hospitalId)->where('bloodRequestStatus', 2)->count();
        

        $donorAppointment = Appointment::where('appointmentStatus', 1)->where('hospitalID', $hospitalId)->count();
        $totalDonorAppoiment = Appointment::count();


        //not calcualte this
        $BloodRequest = BloodRequest::where('hospitalID', $hospitalId)->get();

        //but this to calculate each hospital blood quantity
       /* $bloodInventory = HospitalsBloodBankInventory::where('hospitalID', $hospitalId)->select(DB::raw('bloodType as bloodType'))
       ->select(DB::raw('SUM(bloodQuantity) as bloodQuantity'))->get();

       $bi = HospitalsBloodBankInventory::where('hospitalID', $hospitalId)
            ->join('blood_types', 'hospitals_blood_bank_inventories.bloodType', '=', 'blood_types.id')
            ->select('hospitals_blood_bank_inventories.*', 'blood_types.bloodType')
            ->get();*/



        $BloodType = BloodType::all();
        $options = [];

        foreach ($BloodType as $chart) 
        {
            $options[$chart->bloodType] = 0;
        }

        foreach ($BloodRequest as $value) 
        {
            $BloodType = BloodType::where('id', $value->bloodType)->first();
            $options[$BloodType->bloodType]++;
        } 
    




        $h = HospitalsBloodBankInventory::join('blood_types', 'hospitals_blood_bank_inventories.bloodType', '=', 'blood_types.id')
                                        ->get('*', 'blood_types.bloodType')->toArray();

        foreach ($BloodType as $c) 
        {
            $options[$c->bloodType] = 0;
        }

        foreach($h as $hi)
        {
            $data[] = array(
                'Blood Type' =>$BloodType->first(),
                'Blood Quantity' => $hi->bloodQuantity
            );
        }






        return view('Hospitals.auth.dashboard', compact('EmergencyBloodPending', 'totalDonorAppoiment', 'EmergencyBloodSuccess', 'EmergencyBloodFail', 'RequestBloodPending', 'RequestBloodSuccess', 'RequestBloodFail', 'donorAppointment', 'options', ['data' => $data]));
    }

    public function viewDonorAppointment()
    {
        $hospitalID = Auth::guard('Hospitals')->user()->id;

        $donorAppointment = Appointment::where('hospitalID', $hospitalID)
                            ->join('users', 'appointments.userID', '=', 'users.id')
                            ->join('hospitals', 'appointments.hospitalID', '=', 'hospitals.id')
                            ->join('blood_types', 'users.bloodType', '=', 'blood_types.id')
                            ->select('appointments.*','appointments.id as appointmentId', 'users.*', 'blood_types.bloodType', )
                            ->sortable()
                            ->paginate(5);

        return view('Hospitals.auth.viewDonorAppointment', compact('donorAppointment'));
    }



}
