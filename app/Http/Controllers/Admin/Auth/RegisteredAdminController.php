<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredAdminController extends Controller
{
    /**
     * Display the Admin registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.auth.register');
    }

    /**
     * Handle an incoming Admin registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'adminName' => 'required|min:0|max:255|',
            'adminID' => 'required|min:0|max:12|unique:admin',
            'email' => 'required|email|unique:hospitals',
            'password' => ['required', 'confirmed', 
                            Rules\Password::min(8)->letters()->numbers()->mixedCase()->symbols()
                        ],
        ]);

        $Message = [
            'required' => 'The :attribute field is required.'
            ];

        $admin = admin::create([
            'adminName' => $request->adminName,
            'adminID' => $request->adminID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($admin));

        Auth::login($admin);

        return redirect(RouteServiceProvider::ADMIN_HOME);
    }
}
