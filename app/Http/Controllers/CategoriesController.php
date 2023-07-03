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
      $categoryId = $data['category-id'];
      $categorySlug = Str::slug($data['category-name']);

      $updateCategory = Category::findOrFail($categoryId);
      $updateCategory->name = $data['category-name'];
      $updateCategory->description = $data['category-description'];
      $updateCategory->category_slug = $categorySlug;

      if (isset($data['single-img-upload'])) {
        $oldImg = Category::where('id', $categoryId)->pluck('cover_photo_url');
        // problema ir ar to, ka foldera nosaukums glabājas DB
        Storage::delete('public/' . $oldImg[0]);
        $imagePath = $this->saveCoverImage($categorySlug);
        $updateCategory->cover_photo_url = $imagePath;
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

  protected function saveCoverImage($categorySlug)
  {
    $file = request('category-cover');
    $filename = 'cover_' . $categorySlug . '_' . date("Ymd_His") . '.' . $file->getClientOriginalExtension();
    $imagePath = $file->storeAs('uploads/' . $categorySlug, $filename, 'public');
    $image = Image::make("storage/{$imagePath}")->fit(600, 600);
    $image->save();

    return $imagePath;
  }
}
