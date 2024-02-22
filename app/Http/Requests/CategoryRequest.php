<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
  public function rules(): array
  {

    $rules = [
      'category-name' => 'required',
    ];

    if ($this->getMethod() == 'POST') {
      $rules += ['single-image' => 'required'];
    }

    return $rules;
  }

  public function messages(): array
  {
    return [
      'category-name.required' => 'Nav norādīts kategorijas nosaukums.',
      'single-image.required' => 'Nav pievienota kategorijas titulbilde.'
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
