<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Image as Photos;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use DB;
use File;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::categoriesDesc()->get();
        return view('categories.index', compact('categories')) ;
    }

    public function create()
    {
        $category = new Category();
        return view('categories.create', compact('category'));
        return back();
    }

    public function store()
    {
        $data = request()->validate([
            'category-name' => 'required',
            'category-cover' => ['required', 'image'],
            'category-description' => 'required'
        ]);

        try {
            $categorySlug = Str::slug($data['category-name'], '-');
            $imagePath = $this->saveCoverImage($categorySlug);
            $newCategory = new Category();
            $newCategory->name = $data['category-name'];
            $newCategory->description = $data['category-description'];
            $newCategory->category_slug = $categorySlug;
            $newCategory->cover_photo_url = $imagePath;

            $newCategory->save();

            return redirect('/admin/' . $categorySlug . '/bildes')->with('success', 'Kategorija pievienota!');
        } catch (\Exception $e) {
            return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
        }
    }

    public function edit()
    {
        return back();
    }

    public function update()
    {
        $data = request()->validate([
            'category-id' => 'required',
            'category-name' => 'required',
            'category-cover' => 'image',
        ]);
        try {
            $categoryId = request('category-id');
            $categorySlug = Str::slug($data['category-name'], '-');
            if(request('category-cover')) {
                $imagePath = $this->saveCoverImage($categorySlug);
                $data = array_merge(
                    $data,
                    ['category-cover' => $imagePath]
                );
            }
            $updateCategory = Category::find($categoryId);
            $updateCategory->name = $data['category-name'];
            $updateCategory->category_slug = $categorySlug;
            if(request('category-cover')) {
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
