<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'category-name' => 'required',
      'single-img-upload' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'category-name.required' => 'Nav norādīts kategorijas nosaukums.',
      'single-img-upload.required' => 'Nav pievienota kategorijas titulbilde.'
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
