<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Models\donorRegisterEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DonorEventRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalID = Auth::guard('Hospitals')->user()->id;

        $events = donorRegisterEvents::with(['donor', 'event.hospital'])
            ->whereHas('event.hospital', function ($q) use ($hospitalID) {
                $q->where('id', $hospitalID);
            })
            ->paginate(5);

        return view('Hospitals.auth.viewDonorRegisteredEvent', compact('events'));
    }
}
