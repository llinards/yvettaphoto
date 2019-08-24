<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use DB;

class ImagesController extends Controller
{
    
    public function index()
    {
        return back();
    }
    
    public function create() 
    {
        $categories = DB::table('categories')->select('id','name')->get();
        return view ('photos.create', compact('categories'));
    }

    public function store()
    {
        $photos = request()->validate([
            'selected-category' => 'required',
            'photos' => 'required'
        ]);
        
        $categoryIdForImage = $photos['selected-category'];

        try {   
            $imageCount = 0;     
            foreach ($photos['photos'] as $photo) {
                $imagePath = $photo->store('uploads', 'public');

                $newImage = new Image();
                $newImage->category_id = $categoryIdForImage;
                $newImage->image_name = $imagePath;
                $newImage->save();        
                $imageCount += 1;    
            }
            if ($imageCount > 1) {
                return redirect('/admin/bildes/jaunas')->with('success', 'Bildes pievienotas!');
            } else {
                return redirect('/admin/bildes/jaunas')->with('success', 'Bilde pievienota!');
        }
        } catch (\Exception $e) {
            return redirect('/admin/bildes/jaunas')->with('error', 'Kļūda!');
        }
    }
}
