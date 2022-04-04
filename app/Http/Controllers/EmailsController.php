<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
  public function send(Request $request)
  {
    $data = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'body' => 'required'
    ]);

    try {
      Mail::to('info@yvettaphoto.com')->send(new Contact($data['name'], $data['email'], $data['body']));
      return back()->with('success', 'Thanks! Your  e-mail has been sent!');
    } catch (\Exception $e) {
       return back()->with('error', 'Error!');
    }
  }
}
