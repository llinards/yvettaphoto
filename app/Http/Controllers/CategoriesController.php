<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
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

  public function store(CategoryRequest $data, CategoryService $categoryService)
  {
    try {
      $categoryService->addCategory($data);
      $categoryService->resizeImage($data['single-image']);
      $categoryService->addImage($data['single-image']);
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

  public function update(CategoryRequest $data, CategoryService $categoryService)
  {
    try {
      $categoryService->updateCategory($data);
      if ($data->has('single-image')) {
        $categoryService->resizeImage($data['single-image']);
        $categoryService->addImage($data['single-image']);
      }
      return redirect('/admin/kategorijas')->with('success', 'Kategorija atjaunota!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }

  public function destroy(Category $category, CategoryService $categoryService)
  {
    try {
      $categoryService->destroyCategory($category);
      return redirect('/admin/kategorijas')->with('success', 'Kategorija un tās bildes izdzēstas!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }
}
