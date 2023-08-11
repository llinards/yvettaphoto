<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\FileService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

  public function store(StoreCategoryRequest $data, FileService $fileService, ImageService $imageService)
  {
    try {
      $categoryName = $data['category-name'];
      $categorySlug = Str::slug($categoryName);

      $imageService->resizeImage($data);
      $categoryCoverPhotoUrl = $fileService->storeCategoryCoverPhoto($data);

      Category::create([
        'name' => $categoryName,
        'description' => $data['category-description'],
        'category_slug' => $categorySlug,
        'cover_photo_url' => basename($categoryCoverPhotoUrl),
      ]);
      return redirect('/admin/'.$categorySlug.'/bildes')->with('success', 'Kategorija pievienota!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect()->back()->with('error', 'Kļūda!');
    }
  }

  public function edit(Category $category)
  {
    return view('admin.categories.edit', compact('category'));
  }

  public function update(UpdateCategoryRequest $data, FileService $fileService, ImageService $imageService)
  {
    try {
      $categoryToUpdate = Category::findOrFail($data['category-id']);
      $isCategorySlugChanged = $categoryToUpdate->category_slug !== Str::slug($data['category-name']);

      if ($isCategorySlugChanged) {
        $newCategorySlug = Str::slug($data['category-name']);
        $oldCategorySlug = $categoryToUpdate->category_slug;

        $fileService->updateCategoryDirectory($newCategorySlug, $oldCategorySlug);
        $categoryToUpdate->category_slug = $newCategorySlug;
      }

      $categoryToUpdate->name = $data['category-name'];
      $categoryToUpdate->description = $data['category-description'];

      if (isset($data['single-img-upload'])) {
        $fileService->destroyPhoto($categoryToUpdate->cover_photo_url);
        $imageService->resizeImage($data);

        $categoryToUpdate->cover_photo_url = basename($fileService->storeCategoryCoverPhoto($data));
      }

      $categoryToUpdate->save();
      return redirect('/admin/kategorijas')->with('success', 'Kategorija atjaunota!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }

  public function destroy(Request $data)
  {
    try {
      $category = Category::findOrFail($data['category-id']);
      Storage::deleteDirectory('public/uploads/'.$category->category_slug);
      $category->delete();
      return redirect('/admin/kategorijas')->with('success', 'Kategorija un tās bildes izdzēstas!');
    } catch (\Exception $e) {
      Log::error($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }
}
