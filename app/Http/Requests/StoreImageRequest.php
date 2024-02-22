<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'category-id' => 'required',
      'multiple-images' => 'required'
    ];
  }

  public function messages(): array
  {
    return [
      'category-id.required' => 'Nav izvēlēta kategorija!',
      'multiple-images.required' => 'Nav izvēlētas bildes!'
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
