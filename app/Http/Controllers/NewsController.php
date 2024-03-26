<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use App\NewsImage;
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

  public function update(NewsRequest $data, NewsService $newsService)
  {
    try {
      $newsService->updateNews($data);
      if ($data->has('multiple-images')) {
        foreach ($data['multiple-images'] as $image) {
          $newsService->addImage($image);
        }
      }
      return redirect('/admin/zinas')->with('success', 'Ziņa atjaunota!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroyImage(NewsImage $image, NewsService $newsService)
  {
    try {
      $newsService->destroyImage($image);
      return back()->with('success', 'Bilde dzēsta');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroy(News $news, NewsService $newsService)
  {
    try {
      foreach ($news->images as $image) {
        $newsService->destroyImage($image);
      }
      $newsService->destroyNews($news);
      return back()->with('success', 'Ziņa izdzēsta!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }
}
