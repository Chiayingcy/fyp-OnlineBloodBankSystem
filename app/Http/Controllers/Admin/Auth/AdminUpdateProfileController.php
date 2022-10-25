<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class AdminUpdateProfileController extends Controller
{
    //
    public function index()
    {
        return view('Admin.auth.profile');
    }

    public function update(Request $request)
     {
        $request->validate([
        'adminName' => 'required|',  
        'email' => 'required|email',
        'password' => ['required', 'confirmed', 
                        Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                    ],
        ]);

        $admin = Auth::guard('Admin')->user();
        $admin->adminName = $request['adminName'];
        $admin->email = $request['email'];
        $admin->password = bcrypt($request['password']);

        $admin->save();

        return redirect()->route('Admin.profile')->with('message', 'Profile saved successfully');
     }
}
