<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BloodRequest;
use App\Models\BloodType;
use App\Models\Hospitals;
use App\Models\HospitalsBloodBankInventory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
     /**
     * Display the admin login view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $EmergencyBloodPending  = BloodRequest::where('bloodRequirement', 1)->where('bloodRequestStatus', 0)->count();
        $RequestBloodPending = BloodRequest::where('bloodRequirement', 0)->where('bloodRequestStatus', 0)->count();
        $donorAppoimentPending = Appointment::where('appointmentStatus', 0)->count();

        $EmergencyBloodSuccess  = BloodRequest::where('bloodRequirement', 1)->where('bloodRequestStatus', 1)->count();
        $RequestBloodSuccess = BloodRequest::where('bloodRequirement', 0)->where('bloodRequestStatus', 1)->count();
        $donorAppoimentSuccess = Appointment::where('appointmentStatus', 1)->count();

        $totalDonorsRegistered = User::count();
        $totalHospitalsRegistered = Hospitals::count();
        $totalBloodReceived = Appointment::where('appointmentStatus', 1)->count();

        $bloodInventory = BloodType::whereHas('hospital')->withSum('hospital', 'bloodQuantity')->get()->pluck('hospital_sum_blood_quantity', 'bloodType');
        $BloodType = BloodType::all();


        return view('Admin.auth.dashboard', compact('EmergencyBloodPending', 'RequestBloodPending', 'donorAppoimentPending', 'totalDonorsRegistered', 'totalHospitalsRegistered', 'totalBloodReceived', 'bloodInventory', 'EmergencyBloodSuccess', 'RequestBloodSuccess', 'donorAppoimentSuccess'));
    }

}
