<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    /**
    * Display the registration view.
    *
    * @return \Illuminate\View\View
    */
    public function index()
    {
        return view('auth/t&c');
    }

}
