<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use App\NewsImage;
use App\Services\FileService;
use App\Services\NewsService;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
  public function index()
  {
    $allNews = News::latestNews();
    return view('pages.news', compact('allNews'));
  }

  public function indexAdmin()
  {
    $allNews = News::latestNews();
    return view('admin.news.index', compact('allNews'));
  }

  public function create()
  {
    return view('admin.news.create');
  }

  public function store(NewsRequest $data, NewsService $newsService)
  {
    try {
      $newsService->addNews($data);
      foreach ($data['multiple-images'] as $image) {
        $newsService->addImage($image);
      }
      return redirect('/admin/zinas')->with('success', 'Ziņa pievienota!');
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
