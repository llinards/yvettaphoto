<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'category-id' => 'required',
      'multiple-img-upload' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'category-id.required' => 'Nav izvēlēta kategorija!',
      'multiple-img-upload.required' => 'Nav izvēlētas bildes!'
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
