<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;
use DB;

class GalleryController extends Controller
{
    public function index(Category $category)
    {
        return view ('pages.photos', compact('category'));
    }
}
