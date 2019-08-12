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
        return view('categories.index', compact('categories')) ;
    }

    public function create()
    {
        return view('categories.create');
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

        $newCategory = new Category();
        $newCategory->name = $data['category-name'];
        $newCategory->cover_photo_url = $imagePath;

        $newCategory->save();
        
        return redirect('/admin/kategorijas')->with('success', 'Kategorija pievienota!');
    }

    public function edit(Category $category)
    {
        return view ('categories.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $data = request()->validate([
            'category-name' => 'required',
            'category-cover' => 'image',
        ]);

        if(request('category-cover')) {
            $imagePath = request('category-cover')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
            $image->save();
            
            $data = array_merge(
                $data,
                ['category-cover' => $imagePath]
            );
        }
        $updateCategory = Category::find($category->id);
        $updateCategory->name = $data['category-name'];

        if(request('category-cover')) {
            $updateCategory->cover_photo_url = $imagePath;
        }

        $updateCategory->save();

        return redirect('/admin/kategorijas')->with('success', 'Kategorija atjaunota!');
    }

    public function delete($id)
    {

    }
}
