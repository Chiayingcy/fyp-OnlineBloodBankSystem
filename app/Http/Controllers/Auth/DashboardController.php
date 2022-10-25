<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //$ttBloodDonated = Appointment::count();
        //$appointmentPending = Appointment::where('appointmentStatus', 'Pending')->count();
        //$appointmentSuccess = Appointment::where('appointmentStatus', 'Success')->count();
        //$appointmentFail = Appointment::where('appointmentStatus', 'Fail')->count();


        //compact('ttBloodDonated', 'appointmentPending', 'appointmentSuccess', 'appointmentFail')

        $user = auth()->user();
        $totalDenotions = Appointment::where('AppointmentStatus', 1)->count(); //successful denotions/appointments for all user
        $appointmentsPending = $user->appointmentsPending()->count();
        $appointmentsSuccess = $user->appointmentsSuccess()->count();
        $appointmentsFail = $user->appointmentsFail()->count();

        //$ttBloodDonated = Appointment::with('id')->get();

        return view('dashboard',compact('totalDenotions','appointmentsPending','appointmentsSuccess','appointmentsFail'));
    }
}
