<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\donorRegisterEvents;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonorEventController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;

        $register_event = donorRegisterEvents::where('donor_id', $user)->pluck('event_id')->toArray();

        $events = Events::with(['hospital'])->latest('eventDate')->paginate();

        $now = Carbon::now();

        

        return view('Auth.events', compact('events', 'register_event', 'now'));
    }

    public function eventregister($id)
    {
        $user = auth()->user()->id;

        $register = donorRegisterEvents::create([
            'event_id' => $id,
            'donor_id' => $user,
        ]);

        return redirect()->route('events')->with(compact('register'))->with('message', __('Event Register Successfully.'));
    }

    public function eventdelete($id)
    {
        $register = donorRegisterEvents::where('event_id', $id)->first();

        $register->delete();

        return redirect()->route('events')->with('message', __('Event Register Cancel Successfully.'));
    }


}
