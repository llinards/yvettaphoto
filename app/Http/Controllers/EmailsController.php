<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;

class EmailsController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            Mail::send(new ContactMail($request));
            return back()->with('success', 'Thanks! Your  e-mail has been sent!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error!');
        }
    }
}
