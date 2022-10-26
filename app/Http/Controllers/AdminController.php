<?php

namespace App\Http\Controllers;

use App\News;
use Intervention\Image\Facades\Image as Exif;

class AdminController extends Controller
{
  public function index()
  {
    $allNews = News::orderBy('updated_at', 'DESC')->get();
    return view('admin.index', compact('allNews'));
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
    } catch (\Exception $e) {
      return redirect('/admin/titulbilde/jauna')->with('error', 'Kļūda!');
    }
  }
}
