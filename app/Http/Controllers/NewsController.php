<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use App\NewsImage;
use App\Services\FileService;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
  public function index()
  {
    $allNews = News::orderBy('created_at', 'DESC')->get();
    return view('pages.news', compact('allNews'));
  }

  public function indexAdmin()
  {
    $allNews = News::orderBy('created_at', 'DESC')->get();
    return view('admin.news.index', compact('allNews'));
  }

  public function create()
  {
    return view('admin.news.create');
  }

  public function store(StoreNewsRequest $data, FileService $fileService)
  {
    try {
      $news = News::create([
        'title' => $data['news-title'],
        'description' => $data['description-textarea']
      ]);
      foreach ($data['multiple-images'] as $image) {
        $imageUrl = $fileService->storePhotos($image, 'news');
        $news->images()->create([
          'image_location' => basename($imageUrl)
        ]);
      }
      return redirect('/admin')->with('success', 'Ziņa pievienota!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function edit(News $news)
  {
    return view('admin.news.edit', compact('news'));
  }

  public function update(UpdateNewsRequest $data, FileService $fileService)
  {
    try {
      $newsToUpdate = News::findOrFail($data['news-id']);
      $newsToUpdate->update([
        'title' => $data['news-title'],
        'description' => $data['description-textarea']
      ]);
      if (isset($data['multiple-images'])) {
        foreach ($newsToUpdate->images as $image) {
          $fileService->destroyPhoto('news', $image->image_location);
        }
        $newsToUpdate->images()->delete();
        foreach ($data['multiple-images'] as $image) {
          $imageUrl = $fileService->storePhotos($image, 'news');
          $newsToUpdate->images()->create([
            'image_location' => basename($imageUrl)
          ]);
        }
      }
      return redirect('/admin')->with('success', 'Ziņa atjaunota!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroyImage(NewsImage $image)
  {
    return $image;
  }

  public function destroy(News $news, FileService $fileService)
  {
    try {
      foreach ($news->images as $image) {
        $fileService->destroyFile($image, 'uploads/news/'.$image->image_location);
      }
      $news->delete();
      return back()->with('success', 'Ziņa izdzēsta!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }
}
