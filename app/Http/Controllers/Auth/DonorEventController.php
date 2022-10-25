<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\donorRegisterEvents;
use App\Models\Events;
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

        $events = Events::with(["hospital"])->paginate();

        return view('Auth.events', compact('events', 'register_event'));
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

}
