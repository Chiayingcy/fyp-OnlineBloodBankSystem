<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class AdminViewEventController extends Controller
{
    //
    public function index()
    {
        //$events = Events::all();

        $events = Events::join('hospitals', 'events.hospitalID', '=', 'hospitals.id')
                    ->select('events.id','hospitals.hospitalName' ,'events.eventName', 'events.eventDate', 'events.eventTime', 'events.eventDescription', 'events.image', )
                    ->sortable()
                    ->paginate(5);

        return view('Admin.auth.Event.index', compact('events'));
    }

    public function searchEvent()
    {
        $searchEvent = $_GET['search'];

        $events = Events::where('eventName', 'LIKE', '%'.$searchEvent.'%')->paginate(5);
        
        return view('Admin.auth.Event.searchEvent', compact('events'));
    
    }
}
