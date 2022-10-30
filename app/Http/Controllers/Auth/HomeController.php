<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }


    public function viewBloodRequest()
    {
        $bloodRequests = BloodRequest::where('bloodRequirement', 1)
                        ->join('hospitals', 'blood_requests.hospitalID', '=', 'hospitals.id')
                        ->join('blood_types', 'blood_requests.bloodType', '=', 'blood_types.id')
                        ->select('blood_requests.*', 'blood_types.bloodType', 'hospitals.hospitalName')
                        ->sortable()
                        ->paginate(5);


        return view('home', compact('bloodRequests'));
    }

    public function dviewBloodRequest()
    {
        $bloodRequests = BloodRequest::where('bloodRequirement', 1)
                        ->join('hospitals', 'blood_requests.hospitalID', '=', 'hospitals.id')
                        ->join('blood_types', 'blood_requests.bloodType', '=', 'blood_types.id')
                        ->select('blood_requests.*', 'blood_types.bloodType', 'hospitals.hospitalName')
                        ->sortable()
                        ->paginate(5);


        return view('auth.d_home', compact('bloodRequests'));
    }
}
