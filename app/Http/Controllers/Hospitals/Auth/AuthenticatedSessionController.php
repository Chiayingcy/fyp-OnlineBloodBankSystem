<?php

namespace App\Http\Controllers\Hospitals\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\HospitalsLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the hospitals login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Hospitals.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\HospitalsLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HospitalsLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOSPITALS_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
