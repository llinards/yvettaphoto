<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoverPhotoRequest;
use App\News;
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

  public function store(StoreCoverPhotoRequest $data)
  {
    try {
      $newCoverPhotoImage = $data['single-img-upload'];
      //TODO: failu pārvietošana uz public disk
      Storage::disk('public')->move($newCoverPhotoImage, 'uploads/cover_photos/home-bg.jpg');
      return redirect('/admin')->with('success', 'Titulbilde nomainīta!');
    } catch (\Exception $e) {
      Log::debug($e);
      return redirect('/admin/titulbilde/jauna')->with('error', 'Kļūda!');
    }
  }
}
