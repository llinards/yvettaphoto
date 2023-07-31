<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Exif;

class ImagesController extends Controller
{

  public function index()
  {
    return back();
  }

  public function create()
  {
    $categories = Category::get();
    return view('admin.photos.create', compact('categories'));
  }

  public function store()
  {
    $data = request()->validate([
      'selected-category' => 'required',
      'photos' => 'required'
    ]);
    $categoryIdForImage = request('selected-category');
    $categorySlug = Category::find($categoryIdForImage);
    try {
      $imageCount = 0;
      foreach ($data['photos'] as $photo) {
        $imagePath = $photo->store('uploads/'.$categorySlug->category_slug, 'public');
        $data = Exif::make("storage/{$imagePath}")->exif();
        if (isset($data['Model'])) {
          $cameraModel = $data['Model'];
          $cameraMake = $data['Make'];
          $iso = $data['ISOSpeedRatings'];
          $fNumber = $data['FNumber'];
          $exposureTime = $data['ExposureTime'];
        }

        $newImage = new Image();
        $newImage->category_id = $categoryIdForImage;
        $newImage->image_name = $imagePath;
        if (isset($data['Model'])) {
          $newImage->camera_model = $cameraModel;
          $newImage->camera_make = $cameraMake;
          $newImage->iso = $iso;
          $newImage->f_number = $fNumber;
          $newImage->exposure_time = $exposureTime;
        } else {
          $newImage->camera_model = 'NA';
          $newImage->camera_make = 'NA';
          $newImage->iso = 0;
          $newImage->f_number = 'NA';
          $newImage->exposure_time = 'NA';
        }
        $newImage->save();
        $imageCount += 1;
      }
      if ($imageCount > 1) {
        return redirect('/admin/'.$categorySlug->category_slug.'/bildes')->with('success', 'Bildes pievienotas!');
      } else {
        return redirect('/admin/'.$categorySlug->category_slug.'/bildes')->with('success', 'Bilde pievienota!');
      }
    } catch (\Exception $e) {
      return redirect('/admin/bildes/jaunas')->with('error', 'Kļūda!');
    }
  }

  public function edit(Category $category)
  {
    return view('admin.photos.edit', compact('category'));
  }

  public function getImageInfo(Category $category, Image $image)
  {
    return view('admin.photos.edit-info', compact('image', 'category'));
  }

  public function setImageInfo(Category $category, $id)
  {
    try {
      $updatedImage = request();
      $imageToUpdate = Image::findOrFail($id);
      $imageToUpdate->alt_attribute = $updatedImage['image_alt_attribute'];
      $imageToUpdate->title = $updatedImage['image_title'];
      $imageToUpdate->save();
      return redirect('/admin/'.$category->category_slug.'/bildes')->with('success', 'Atjaunots!');
    } catch (\Exception $e) {
      return back()->with('error', $e);
    }
  }

  public function destroy()
  {
    $data = request('image-id');
    $imageLocation = Image::find($data);
    try {
      Image::destroy($data);
      Storage::delete('public/'.$imageLocation->image_name);
      return back()->with('success', 'Bilde izdzēsta!');
    } catch (\Exception $e) {
      return back()->with('error', 'Kļūda!');
    }
  }
}
