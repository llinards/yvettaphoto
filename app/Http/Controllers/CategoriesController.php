<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    public function index() 
    {
        return view('categories.index');
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
        
        return redirect ('/admin/kategorijas/jauna');
    }
}
