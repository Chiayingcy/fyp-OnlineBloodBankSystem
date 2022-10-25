<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

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

        return view('Admin.auth.dashboard', compact('EmergencyBloodPending', 'RequestBloodPending', 'donorAppoimentPending'));
    }
}
