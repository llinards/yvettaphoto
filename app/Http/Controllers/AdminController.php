<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

  public function store(Request $data)
  {
    $data->validate([
      'single-img-upload' => ['required']
    ],
      [
        'single-img-upload.required' => 'Nav izvēlēta bilde.'
      ]);
    try {
      $newCoverPhotoImage = $data['single-img-upload'];
      $newCoverPhotoImageFilename = basename($newCoverPhotoImage);
      Storage::disk('public')->move($newCoverPhotoImage, 'uploads/cover_photos/' . $newCoverPhotoImageFilename);
      return redirect('/admin/titulbilde/jauna')->with('success', 'Titulbilde nomainīta!');
    } catch (\Exception $e) {
      Log::debug($e);
      return redirect('/admin/titulbilde/jauna')->with('error', 'Kļūda!');
    }
  }
}
