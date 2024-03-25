<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryImage;
use App\Http\Requests\StoreImageRequest;
use App\Services\CategoryImagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryImagesController extends Controller
{
  public function index(Category $category)
  {
    return view('admin.photos.index', compact('category'));
  }

  public function store(StoreImageRequest $data, CategoryImagesService $categoryImagesService,)
  {
    try {
      $categoryImagesService->addImages($data);
      return back()->with('success', 'Pievienots!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/bildes/jaunas')->with('error', 'Kļūda!');
    }
  }

  public function update(Request $image, CategoryImagesService $categoryImagesService)
  {
    try {
      $categoryImagesService->updateImage($image);
      return back()->with('success', 'Atjaunots!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroy(CategoryImage $image, CategoryImagesService $categoryImagesService)
  {
    try {
      $categoryImagesService->destroyImage($image);
      return back()->with('success', 'Bilde izdzēsta!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }
}
