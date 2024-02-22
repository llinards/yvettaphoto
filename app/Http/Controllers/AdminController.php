<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoverPhotoRequest;
use App\Services\FileService;
use Illuminate\Support\Facades\Log;

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

  public function store(StoreCoverPhotoRequest $data, FileService $fileService)
  {
    try {
      $fileService->storeFile($data['single-image'], 'uploads/cover_photos', true);
      return redirect('/admin')->with('success', 'Titulbilde nomainīta!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect()->back()->with('error', 'Kļūda!');
    }
  }
}
