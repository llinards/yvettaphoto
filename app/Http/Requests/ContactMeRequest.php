<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMeRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'name' => 'required',
      'email' => 'required|email',
      'body' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Your name is required!',
      'email.required' => 'Your e-mail is required!',
      'email.email' => 'Your e-mail is not valid!',
      'body.required' => 'Your message is required!'
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
