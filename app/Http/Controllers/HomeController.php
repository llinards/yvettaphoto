<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Image;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('pages.index', compact('categories'));
    }

    public function aboutMe()
    {
        return view('pages.about-me');
    }

    public function galleryImages(Category $category)
    {
        $images = Image::imagesDesc($category)->get();
        return view('pages.photos', compact('category', 'images'));
    }
}
