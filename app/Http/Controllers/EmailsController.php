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
            return redirect('/#fourth')->with('success', 'Paldies, Jūsu e-pasts ir nosūtīts!');
        } catch (\Exception $e) {
            return redirect('/#fourth')->with('error', 'Kļūda!');
        }
        
        // try {
        //     $data = request()->validate([
        //         'name' => ['required', 'string', 'max:25'],
        //         'email' => ['required', 'email'],
        //         'msg' => ['required', 'string']
        //     ]);

        //     $name = $data['name'];
        //     $email = $data['email'];
        //     $msg = $data['msg'];


        //     return redirect('/#fourth')->with('success', 'Paldies, Jūsu e-pasts ir nosūtīts!');
        // } catch (\Exception $e) {
        //     return redirect('/#fourth')->with('error', 'Kļūda!');
        // }
       
        
        
    }
}
