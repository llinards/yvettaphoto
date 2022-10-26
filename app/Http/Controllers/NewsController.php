<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
      $allNews = News::orderBy('updated_at')->get();
      return view('pages.news', compact('allNews'));
    }
}
