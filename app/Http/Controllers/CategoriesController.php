<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image as Photos;
use DB;
use File;
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
    $category = new Category();
    return view('admin.categories.create', compact('category'));
  }

  public function store()
  {
    $data = request()->validate([
      'category-name' => 'required',
      'category-cover' => ['required', 'image', 'max:1536'],
      'category-description' => 'nullable'
    ]);

    try {
      $categorySlug = Str::slug($data['category-name'], '-');
      $imagePath = $this->saveCoverImage($categorySlug);
      $data = Category::create([
        'name' => $data['category-name'],
        'description' => $data['category-description'],
        'category_slug' => $categorySlug,
        'cover_photo_url' => $imagePath
      ]);
      return redirect('/admin/' . $categorySlug . '/bildes')->with('success', 'Kategorija pievienota!');
    } catch (\Exception $e) {
      return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
    }
  }

  public function edit(Category $category)
  {
    $category = Category::where('id', $category->id)->get();
    return view('admin.categories.edit', compact('category'));
  }

  public function update()
  {
    $data = request()->validate([
      'category-id' => 'required',
      'category-name' => 'required',
      'category-description' => 'nullable',
      'category-cover' => ['image', 'max:1536'],
    ]);
    try {
      $categoryId = request('category-id');
      $categorySlug = Str::slug($data['category-name'], '-');
      $updateCategory = Category::find($categoryId);
      $updateCategory->name = $data['category-name'];
      $updateCategory->description = $data['category-description'];
      $updateCategory->category_slug = $categorySlug;
      if (request('category-cover')) {
        $oldImg = Category::where('id', $categoryId)->pluck('cover_photo_url');
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
