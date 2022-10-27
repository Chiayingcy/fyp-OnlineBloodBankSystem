<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use App\Models\BloodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodTypes = BloodType::all();
        return view('Hospitals.auth.bloodRequest', compact('bloodTypes'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'bloodType' => 'required',
            'bloodQuantity' => 'required',
            'bloodRequirement' => 'required',
        ]);

        $requestBlood = BloodRequest::create([
            'hospitalID' => $request->hospitalID,
            'bloodType' => $request->bloodType,
            'bloodQuantity' => $request->bloodQuantity,
            'bloodRequirement' => $request->bloodRequirement,
        ]);

        return redirect()->route('Hospitals.bloodRequest.index', compact('requestBlood'))->with('message', __('Blood Request is submitted to the admin successfully.'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewBloodRequest()
    {
        $hospitalID = Auth::guard('Hospitals')->user()->id;

        $bloodRequests = BloodRequest::where('hospitalID', $hospitalID)
                        ->join('hospitals', 'blood_requests.hospitalID', '=', 'hospitals.id')
                        ->join('blood_types', 'blood_requests.bloodType', '=', 'blood_types.id')
                        ->select('blood_requests.*', 'blood_types.bloodType')
                        ->sortable()
                        ->paginate(5);


        return view('Hospitals.auth.viewBloodRequest', compact('bloodRequests'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BloodRequest::where('id',$id)->delete();
        $bloodRequests = Auth::guard('Hospitals')->user()->appointments;
        
        return redirect()->route('Hospitals.bloodRequest.index' , compact('bloodRequests'));
    }

    public function editBloodRequest($id)
    {
        $bloodRequest = BloodRequest::with('bloodTypes', 'hospital')->find($id);

        return view('Hospitals.auth.bloodRequest.edit', compact('bloodRequest'));
    }

    public function updateBloodRequest(Request $request, $id)
    {
        $bloodRequest = BloodRequest::find($id);
        $bloodRequest->bloodQuantity = $request->bloodQuantity;
        $bloodRequest->save();

        return redirect()->route('Hospitals.bloodRequest.index')->with('message', __('Blood Request is Update successfully.'));
    }
}
