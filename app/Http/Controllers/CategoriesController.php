<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
  public function index()
  {
    $categories = Category::latest()->get();
    return view('admin.categories.index', compact('categories'));
  }

  public function create()
  {
    return view('admin.categories.create');
  }

  public function store(StoreCategoryRequest $data, CategoryService $categoryService)
  {
    try {
      $categoryService->addCategory($data);
      $categoryService->resizeImage($data['single-img-upload']);
      $categoryService->addImage($data['single-img-upload']);
      return redirect('/admin/'.$categoryService->getSlug().'/bildes')->with('success', 'Kategorija pievienota!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect()->back()->with('error', 'Kļūda!');
    }
  }

  public function edit(Category $category)
  {
    return view('admin.categories.edit', compact('category'));
  }

  public function update(UpdateCategoryRequest $data, CategoryService $categoryService)
  {
    try {
      $categoryService->updateCategory($data);
      if ($data->has('single-img-upload')) {
        $categoryService->resizeImage($data['single-img-upload']);
        $categoryService->addImage($data['single-img-upload']);
      }
      return redirect('/admin/kategorijas')->with('success', 'Kategorija atjaunota!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }

  public function destroy(Request $data, CategoryService $categoryService)
  {
    try {
      $categoryService->destroyCategory($data);
      return redirect('/admin/kategorijas')->with('success', 'Kategorija un tās bildes izdzēstas!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }
}
