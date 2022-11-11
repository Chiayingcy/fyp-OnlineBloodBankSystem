<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\HospitalsEventRequest;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Hospitals;
use Carbon\Carbon;

use Illumiate\Support\Facedes\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;

class EventController extends Controller
{
    //
    public function index()
    {
        $hospitalID = Auth::guard('Hospitals')->user()->id;

        $events = Events::where('hospitalID', $hospitalID)->get();

        return view('Hospitals.auth.Event.index', compact('events'));
    }

    public function create()
    {
        $hospitals = Hospitals::get(['id', 'hospitalName'])->toArray();

        $eventDate = Carbon::now()->addDays(7)->format('Y-m-d');

        $openingTime = Carbon::createFromTime(8,0,0)->format('H:i:s');

        $closingTime = Carbon::createFromTime(20,0,0)->format('H:i:s');


        return view('Hospitals.auth.Event.create', compact('hospitals', 'eventDate', 'openingTime', 'closingTime'));
    }

    public function submitEvent(HospitalsEventRequest $request)
    {
        $events = Events::with('hospital')->get();
        
        $destinationPath = '';

        if ($request->hasFile('image')) 
        {
            //Get filename with the extension
            $file = $request->file('image');

            //Get just the filename
            $extension = $file->getClientOriginalName();
            $fileName = time().'.'.$extension;

            //get the filename to store
            $destinationPath = public_path().'/eventImage';

            $file->move($destinationPath, $fileName);
        }

        $EventData = [
            'hospitalID' => $request['hospitalID'],
            'eventName' => $request['eventName'],
            'eventDate' => $request['eventDate'],
            'eventTime' => $request['eventTime'],
            'eventDescription' => $request['eventDescription'],
            'image' => $fileName,
        ];

        $saveEvent = Events::create($EventData);

        return redirect()->route('Hospitals.event', compact('events',))->with('message', 'Event created succesfully!');
    }

    public function deleteEvent(Request $request, $id)
    {
        $event = Events::find($id)->delete();

        return redirect()->route('Hospitals.event',compact('event'))->with('message', 'Event deleted successfully!');
    }

    public function edit($id)
    {
        $eventDate = Carbon::now()->addDays(7)->format('Y-m-d');

        $openingTime = Carbon::createFromTime(8,0,0)->format('H:i:s');

        $closingTime = Carbon::createFromTime(20,0,0)->format('H:i:s');

        $event = Events::find($id);


        return view('Hospitals.auth.Event.edit', compact('event', 'eventDate', 'openingTime', 'closingTime'));
    }

    public function editUpdateEvent(Request $request, $id)
    {
        $event = Events::find($id);

        $event->eventName = $request->input('eventName');
        $event->eventDate = $request->input('eventDate');
        $event->eventTime = $request->input('eventTime');
        $event->eventDescription = $request->input('eventDescription');

        if ($request->hasFile('image')) 
        {
            $destinationPath = public_path().'/eventImage';
            if(FacadesFile::exists($destinationPath))
            {

                FacadesFile::delete($destinationPath);
            }

            //Get filename with the extension
            $file = $request->file('image');

            //Get just the filename
            $extension = $file->getClientOriginalName();
            $fileName = time().'.'.$extension;

            //get the filename to store
            $destinationPath = public_path().'/eventImage';

            $file->move($destinationPath, $fileName);

            $event->image = $fileName;
        }

        $event->save();

        return redirect()->route('Hospitals.event', compact('event'))->with('message', 'Event Information updated successfully');
    }

    public function searchEvent()
    {
        $searchEvent = $_GET['search'];

        $events = Events::where('eventName', 'LIKE', '%'.$searchEvent.'%')->paginate(5);
        
        return redirect()->back()->with(compact('events'));
    
    }
}
