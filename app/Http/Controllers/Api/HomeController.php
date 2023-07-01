<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function getAllCategoryImages(Category $category): array
  {

    $galleryImages = Category::with('images')->get();

    //Neizdodas atgriezt pareizo kategoriju un pareizās bildes, kas ir pie kategorijas

    return [$category, $galleryImages];
  }
}
