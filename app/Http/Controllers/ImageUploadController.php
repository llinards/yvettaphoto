<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
  public function store(Request $data)
  {
    if ($data->has('single-image')) {
      return $data->file('single-image')->store('temp', 'public');
    }
    if ($data->has('multiple-images')) {
      foreach ($data->file('multiple-images') as $file) {
        return $file->store('temp', 'public');
      }
    }
  }

  public function destroy(Request $data)
  {
    Storage::delete('public/'.$data->getContent());
    return '';
  }
}
