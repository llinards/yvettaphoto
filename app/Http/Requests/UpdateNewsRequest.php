<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'news-title' => ['required', 'max:100'],
      'description-textarea' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'news-title.required' => 'Nav ievadīts virsraksts!',
      'news-title.max' => 'Virsrakts ir pārāk garš! Maksimālais simbolu skaits ir 100.',
      'description-textarea.required' => 'Nav ievadīts teksts!',
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
