<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoverPhotoRequest;
use App\News;
use App\Services\FileService;
use Illuminate\Support\Facades\Log;

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

  public function store(StoreCoverPhotoRequest $data, FileService $fileService)
  {
    try {
      $fileService->storeFile($data['single-img-upload'], 'uploads/cover_photos', true);
      return redirect('/admin')->with('success', 'Titulbilde nomainīta!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect()->back()->with('error', 'Kļūda!');
    }
  }
}
