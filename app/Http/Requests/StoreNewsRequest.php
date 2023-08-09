<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'news-title' => ['required', 'max:100'],
      'news-description' => 'required',
      'multiple-img-upload' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'news-title.required' => 'Nav ievadīts virsraksts!',
      'news-title.max' => 'Virsrakts ir pārāk garš! Maksimālais simbolu skaits ir 100.',
      'news-description.required' => 'Nav ievadīts teksts!',
      'multiple-img-upload.required' => 'Nav pievienotas bildes!',
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
