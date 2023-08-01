<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'category-id' => 'required',
      'category-name' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'category-id.required' => 'Kļūda! Mēģini vēlreiz.',
      'category-name.required' => 'Nav norādīts kategorijas nosaukums.',
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
