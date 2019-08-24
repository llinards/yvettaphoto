<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Image;
use DB;

class GalleryController extends Controller
{
    public function index(Category $category)
    {
        $categoryId = $category->id;
        $images = DB::table('images')->select('image_name')->where('category_id', $categoryId)->get();
        return view ('pages.photos', compact('category', 'images'));
    }
}
