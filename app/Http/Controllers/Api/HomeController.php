<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function galleryImages(Category $category)
    {
        $images = Image::imagesDesc($category)->get();
        return [$images, $category];
    } 
}