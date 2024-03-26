<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
  public function rules(): array
  {
    $rules = [
      'news-title' => ['required', 'max:100'],
      'description-textarea' => 'required',
    ];

    if ($this->getMethod() == 'POST') {
      $rules += ['multiple-images' => 'required'];
    }
    return $rules;
  }

  public function messages()
  {
    return [
      'news-title.required' => 'Nav ievadīts virsraksts!',
      'news-title.max' => 'Virsrakts ir pārāk garš! Maksimālais simbolu skaits ir 100.',
      'description-textarea.required' => 'Nav ievadīts teksts!',
      'multiple-images.required' => 'Nav pievienotas bildes!',
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
