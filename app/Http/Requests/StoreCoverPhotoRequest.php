<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoverPhotoRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'single-image' => ['required']
    ];
  }

  public function messages(): array
  {
    return [
      'single-image.required' => 'Nav izvēlēta bilde!',
    ];
  }

  public function authorize(): bool
  {
    return true;
  }
}
