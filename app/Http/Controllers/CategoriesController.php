<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;
use DB;

class CategoriesController extends Controller
{
    public function index() 
    {
        $categories = DB::table('categories')->select('id','name','cover_photo_url')->orderBy('created_at', 'DESC')->get();
        return view('pages.admin.categories', compact('categories')) ;
    }

    public function create()
    {
        return back();
    }

    public function store() 
    {
        $data = request()->validate([
            'category-name' => 'required',
            'category-cover' => ['required', 'image'],
        ]);

        $imagePath = request('category-cover')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();

        try {
            $newCategory = new Category();
            $newCategory->name = $data['category-name'];
            $newCategory->cover_photo_url = $imagePath;

            $newCategory->save();
            
            return redirect('/admin/kategorijas')->with('success', 'Kategorija pievienota!');
        } catch (\Exception $e) {
            return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
        }
    }

    public function edit()
    {
        return back();
    }

    public function update(Category $category)
    {
        $data = request()->validate([
            'category-id' => 'required',
            'category-name' => 'required',
            'category-cover' => 'image',
        ]);

        $categoryId = $data['category-id'];

        if(request('category-cover')) {
            $imagePath = request('category-cover')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
            $image->save();
            
            $data = array_merge(
                $data,
                ['category-cover' => $imagePath]
            );
        }

        try {
            $updateCategory = Category::find($categoryId);
            $updateCategory->name = $data['category-name'];
            if(request('category-cover')) {
                $updateCategory->cover_photo_url = $imagePath;
            }
            $updateCategory->save();
            return redirect('/admin/kategorijas')->with('success', 'Kategorija atjaunota!');
        } catch (\Exception $e) {
            return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
        }
    }

    public function destroy(Request $request)
    {
        $data = $request->input('category-id');
        try {
            $categoryToRemove = Category::where('id', $data)->delete();
            Category::destroy($data);
            return redirect('/admin/kategorijas')->with('success', 'Kategorija izdzēsta!');
        } catch (\Exception $e) {
            return redirect('/admin/kategorijas')->with('error', 'Kļūda!');
        }
    }
}
