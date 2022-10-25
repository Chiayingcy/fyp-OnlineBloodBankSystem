<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactUsController extends Controller
{
    // Create Contact Form
    public function create() 
    {
        return view('auth.contactUs');
    }


    // Store Contact Form input data
    public function ContactUsForm(Request $request) {
        // Form validation
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:9|max:11|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/|',
                'subject'=>'required',
                'message' => 'required'
           ]);
           
          //  Store data in database
          //Contact::create($request->all());

          //get current session user id then store all the information into database
          Contact::create([
            'userID'=>auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            ]
        );
          // 
          return back()->with('success', 'We have received your message and we will get back you soon!.');
      }
}
