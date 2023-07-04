<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image as Photos;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
  public function index()
  {
    $categories = Category::categoriesDesc()->get();
    return view('admin.categories.index', compact('categories'));
  }

  public function create()
  {
    return view('admin.categories.create');
  }

  public function store(Request $data)
  {
    $data->validate([
      'category-name' => 'required',
      'single-img-upload' => 'required',
      'category-description' => 'nullable'
    ],
      [
        'category-name.required' => 'Nav norādīts kategorijas nosaukums.',
        'single-img-upload.required' => 'Nav pievienot kategorijas titulbilde'
      ]
    );
    try {
      $categorySlug = Str::slug($data['category-name']);
      $categoryCoverImage = $data['single-img-upload'];

      $resizedCategoryCoverImage = Image::make("storage/{$categoryCoverImage}")->fit(600, 600);
      $resizedCategoryCoverImage->save();

      $categoryCoverImageFilename = basename($categoryCoverImage);
      $categoryCoverImagePath = 'uploads/' . $categorySlug . '/' . $categoryCoverImageFilename;

      Storage::disk('public')->move($categoryCoverImage, $categoryCoverImagePath);

      $data = Category::create([
        'name' => $data['category-name'],
        'description' => $data['category-description'],
        'category_slug' => $categorySlug,
        'cover_photo_url' => $categoryCoverImagePath
      ]);
      return redirect('/admin/' . $categorySlug . '/bildes')->with('success', 'Kategorija pievienota!');
    } catch (\Exception $e) {
      Log::debug($e);
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }

  public function edit(Category $category)
  {
    $category = Category::where('id', $category->id)->get();
    return view('admin.categories.edit', compact('category'));
  }

  public function update(Request $data)
  {
//    return $data;
    $data->validate([
      'category-id' => 'required',
      'category-name' => 'required',
      'category-description' => 'nullable',
    ],
      [
        'category-id.required' => 'Kļūda! Mēģini vēlreiz.',
        'category-name.required' => 'Nav norādīts kategorijas nosaukums.',
      ]);
    try {
      $updateCategory = Category::findOrFail($data['category-id']);

      if (Str::slug($data['category-name']) !== $updateCategory->category_slug) {
        $categorySlug = Str::slug($data['category-name']);
        Storage::disk('public')->makeDirectory('uploads/' . $categorySlug);
        Storage::disk('public')->move('uploads/' . $updateCategory->category_slug, 'uploads/' . $categorySlug);
        $updateCategory->cover_photo_url = 'uploads/' . $categorySlug . '/' . basename($updateCategory->cover_photo_url);
        
        foreach ($updateCategory->images as $image) {
          $imageToUpdate = Photos::findOrFail($image->id);
          $imageToUpdate->image_name = 'uploads/' . $categorySlug . '/' . basename($image->image_name);
          $imageToUpdate->save();
        }
      } else {
        $categorySlug = $updateCategory->category_slug;
      }

      $updateCategory->name = $data['category-name'];
      $updateCategory->description = $data['category-description'];
      $updateCategory->category_slug = $categorySlug;

      if (isset($data['single-img-upload'])) {
        $oldImg = $updateCategory->cover_photo_url;
        Storage::disk('public')->delete($oldImg);

        $resizedCategoryCoverImage = Image::make("storage/" . $data['single-img-upload'])->fit(600, 600);
        $resizedCategoryCoverImage->save();

        $categoryCoverImageFilename = basename($data['single-img-upload']);
        $categoryCoverImagePath = 'uploads/' . $categorySlug . '/' . $categoryCoverImageFilename;
        Storage::disk('public')->move($data['single-img-upload'], $categoryCoverImagePath);

        $updateCategory->cover_photo_url = $categoryCoverImagePath;
      }
      $updateCategory->save();
      return redirect('/admin/kategorijas')->with('success', 'Kategorija atjaunota!');
    } catch (\Exception $e) {
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }

  public function destroy()
  {
    try {
      $categoryId = request('category-id');
      $category = Category::find($categoryId);
      $categorySlug = $category->category_slug;
      Storage::deleteDirectory('public/uploads/' . $categorySlug);
      Category::destroy($categoryId);
      Photos::where('category_id', $categoryId)->delete();
      return redirect('/admin/kategorijas')->with('success', 'Kategorija un tās bildes izdzēstas!');
    } catch (\Exception $e) {
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }
}
