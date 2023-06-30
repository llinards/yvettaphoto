<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
  public function store(Request $data)
  {
    if ($data->has('single-img-upload')) {
      return $data->file('single-img-upload')->store('temp', 'public');
    }
  }

  public function destroy(Request $data)
  {
    Storage::delete('public/' . $data->getContent());
    return '';
  }
}
