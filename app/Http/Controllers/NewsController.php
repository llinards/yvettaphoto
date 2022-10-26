<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
      $allNews = News::with( 'images')->orderBy('updated_at', 'DESC')->get();
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
        'news-image.required' => 'Trūkst bildes!'
      ]);

      try {
        $news = News::create([
          'title' => $data['news-title'],
          'description' => $data['news-description']
        ]);
        foreach($data['news-image'] as $image) {
          $imagePath = $image->store('uploads/news', 'public');
          $news->images()->create([
            'category_id' => 0,
            'image_name' => $imagePath,
            'camera_model' => 'NA',
            'camera_make' => 'NA',
            'iso' => 0,
            'f_number' => 'NA',
            'exposure_time' => 'NA'
          ]);
        }
        return redirect('/admin')->with('success', 'Ziņa pievienota!');
      } catch (\Exception $e) {
        return back()->with('error', 'Kļūda!');
      }
    }


    public function edit(News $news)
    {
      dd($news);
    }
}
