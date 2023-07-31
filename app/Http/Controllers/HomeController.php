<?php

namespace App\Http\Controllers;

use App\Category;

class HomeController extends Controller
{
  public function getAllCategories()
  {
    $categories = Category::latest()->get();
    return view('pages.portfolio', compact('categories'));
  }

  public function getAllCategoryImages(Category $category)
  {
    return view('pages.photos', compact('category'));
  }
}
