<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image as Exif;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index');
  }

  public function create()
  {
    return view('admin.create');
  }

  public function store()
  {
    $data = request()->validate([
      'main-img-cover' => ['required', 'image', 'max:1536']
    ]);
    try {
      $file = request('main-img-cover');
      $filename = 'home-bg.jpg';
      $imagePath = $file->storeAs('uploads/' . 'cover_photos', $filename, 'public');
      $image = Exif::make("storage/{$imagePath}");
      $image->save();
      return redirect('/admin/titulbilde/jauna')->with('success', 'Titulbilde nomainīta!');
    } catch (\Exception $exception) {
      return redirect('/admin/titulbilde/jauna')->with('error', 'Kļūda!');
    }
  }
}
