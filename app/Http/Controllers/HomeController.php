<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Image;

class HomeController extends Controller
{
    public function index() 
    {
        return view('pages.index');
    }
    public function gallery() 
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('pages.gallery', compact('categories')) ;
    }
    public function aboutMe() 
    {
        return view('pages.about-me');
    }
    public function galleryImages(Category $category)
    {
        $images = Image::where('category_id', $category->id)->get();
        return view ('pages.photos', compact('category', 'images'));
    }
    public function admin()
    {
        return view('pages.admin.index');
    }
}
