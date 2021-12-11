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

    public function portfolio()
    {
        $categories = Category::latest()->get();
        return view('pages.portfolio', compact('categories'));
    }

    public function contactMe()
    {
        return view('pages.contact-me');
    }

    public function artistStatement()
    {
        return view('pages.artist-statement');
    }

    public function bio()
    {
        return view('pages.bio');
    }

    public function galleryImages(Category $category)
    {
        // $images = Image::imagesDesc($category)->get();
        return view('pages.photos', compact('category'));
    }
}
