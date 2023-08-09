<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
  public function index()
  {
    $allNews = News::orderBy('created_at', 'DESC')->get();
    return view('pages.news', compact('allNews'));
  }

  public function create()
  {
    return view('admin.news.create');
  }

  public function store(Request $data)
  {
    $data->validate([
      'news-title' => ['required', 'max:100'],
      'news-description' => 'required',
      'news-image' => 'required'
    ],
      [
        'news-title.required' => 'Trūkst virsraksta!',
        'news-title.max' => 'Virsraksts pārāk garš!',
        'news-description.required' => 'Trūkst teksta!',
        'news-image.required' => 'Trūkst bildes!',
        'news-image.mimes' => 'Pārliecinies, ka augšupielādē foto!'
      ]);

    try {
      $news = News::create([
        'title' => $data['news-title'],
        'description' => $data['news-description']
      ]);
      if ($news) {
        foreach ($data['news-image'] as $image) {
          $imagePath = $image->store('uploads/news', 'public');
          $news->images()->create([
            'image_location' => $imagePath
          ]);
        }
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

  public function update(Request $data)
  {
    $data->validate([
      'news-title' => ['required', 'max:100'],
      'news-description' => 'required',
      'news-image' => 'max:1536'
    ],
      [
        'news-title.required' => 'Trūkst virsraksta!',
        'news-title.max' => 'Virsraksts pārāk garš!',
        'news-description.required' => 'Trūkst teksta!',
      ]);
    try {
      $newsToUpdate = News::findOrFail($data['id']);
      $newsToUpdate->update([
        'title' => $data['news-title'],
        'description' => $data['news-description']
      ]);
      if (isset($data['news-image'])) {
        foreach ($newsToUpdate->images as $image) {
          Storage::delete('public/'.$image->image_location);
        }
        $newsToUpdate->images()->delete();
        foreach ($data['news-image'] as $image) {
          $imagePath = $image->store('uploads/news', 'public');
          $newsToUpdate->images()->create([
            'image_location' => $imagePath
          ]);
        }
      }
      return redirect('/admin')->with('success', 'Ziņa atjaunota!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroy(News $news)
  {
    try {
      foreach ($news->images as $image) {
        Storage::delete('public/'.$image->image_location);
      }
      $news->delete();
      $news->images()->delete();
      return back()->with('success', 'Ziņa izdzēsta!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }
}
