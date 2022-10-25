<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Events;
use App\Models\Hospitals;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AppointmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($status = '')
    {
        $userID = auth()->user()->id;

        $min_date =Carbon::now()->addDays(2)->format('Y-m-d');

        $openingTime = Carbon::createFromTime(8,0,0)->format('H:i:s');

        $closingTime = Carbon::createFromTime(20,0,0)->format('H:i:s');

        $hospital = Hospitals::all();

        $appointments = Auth::user()->appointmentsSpecific($status);

        $appointments = Appointment::where('userID', $userID)->sortable()->paginate(5);

        return view('auth.Appointments.index')->with(compact('userID','appointments', 'hospital', 'status', 'min_date', 'openingTime', 'closingTime'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $appointments=auth()->user()->appointments;

        return view('auth.Appointments.create',compact('appointments',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AppointmentRequest $request)
    {
        $user = auth()->user()->id;
        $Appointment_new = Appointment::where('userID', $user)->get();

        foreach ($Appointment_new as $value) 
        {
            $toDate = Carbon::parse($value->appointmentDate);
            $fromDate = Carbon::parse($request->appointmentDate);
            $months = $toDate->diffInMonths($fromDate);

            if ($months <= 3) 
            {
                return redirect()->back()->with('message', __('Appointment donate again their blood after 3 months..'));
            }
        }

        $Appointment = Appointment::where('userID', $user)->where('appointmentDate', $request->appointmentDate)->exists();
        
        if ($Appointment) 
        {
            return redirect()->back()->with('message', __('Appointment can donet again their same day.'));
        }

        Appointment::create(
            [
                'userID' => auth()->user()->id,
                'appointmentDate' => $request->appointmentDate,
                'appointmentTime' => $request->appointmentTime,
                'hospitalId' => $request->hospitalId,
            ]
        );

        return redirect()->back()->with('message', __('Appointment Created Successfully.'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Appointment = Appointment::find($id);
        $hospital = Hospitals::all();

        return view('auth.Appointments.edit', compact('Appointment', 'hospital'));
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
        $user = auth()->user()->id;

        $Appointment_new = Appointment::where('userID', $user)->get();

        foreach ($Appointment_new as $value) 
        {
            $toDate = Carbon::parse($value->appointmentDate);
            $fromDate = Carbon::parse($request->appointmentDate);
            $months = $toDate->diffInMonths($fromDate);

            if ($months <= 3 && !Appointment::where('userID', $user)->where('appointmentDate', $request->appointmentDate)->exists()) 
            {
                return redirect()->back()->with('message', __('Appointment donate again their blood after 3 months..'));
            }
        }

        $updateAppointment = Appointment::find($id);
        $updateAppointment->appointmentDate = $request->appointmentDate;
        $updateAppointment->appointmentTime = $request->appointmentTime;
        $updateAppointment->hospitalId = $request->hospitalId;
        $updateAppointment->save();

        return redirect()->route('appointment.index')->with('message', __('Appointment Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::where('id',$id)->delete();
        $appointments=auth()->user()->appointments;
        
        return to_route('appointment.index',compact('appointments'));
    }
}
