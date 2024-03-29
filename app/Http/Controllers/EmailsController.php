<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use App\Mail\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
  public function send(ContactMeRequest $data)
  {
    try {
      Mail::to('info@yvettaphoto.com')->send(new Contact($data['name'], $data['email'], $data['body']));
      return back()->with('success', 'Thanks! Your  e-mail has been sent!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Error!');
    }
  }
}
