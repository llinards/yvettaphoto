<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreImageRequest;
use App\Image;
use App\Services\FileService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{

  public function index()
  {
    return back();
  }

  public function create()
  {
    $categories = Category::all();
    return view('admin.photos.create', compact('categories'));
  }

  public function store(StoreImageRequest $data, FileService $fileService, ImageService $imageService)
  {
    try {
      $categoryId = $data['selected-category'];
      $categorySlug = Category::findOrFail($categoryId)->category_slug;
      foreach ($data['multiple-img-upload'] as $image) {
        $imageUrl = $fileService->storePhotos($image, $categorySlug);
        $exifData = $imageService->getImageExifData($imageUrl);

        $newImage = new Image();
        $newImage->category_id = $categoryId;
        $newImage->image_name = basename($imageUrl);
        if ($exifData) {
          $newImage->camera_model = $exifData['Model'];
          $newImage->camera_make = $exifData['Make'];
          $newImage->iso = $exifData['ISOSpeedRatings'];
          $newImage->f_number = $exifData['FNumber'];
          $newImage->exposure_time = $exifData['ExposureTime'];
        }
        $newImage->save();
      }
      return redirect('/admin/'.$categorySlug.'/bildes')->with('success', 'Pievienots!');
    } catch (\Exception $e) {
      Log::error($e);
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

  public function setImageInfo(Category $category, Request $image)
  {
    try {
      $imageToUpdate = Image::findOrFail($image['image-id']);
      $imageToUpdate->alt_attribute = $image['image-alt-attribute'];
      $imageToUpdate->title = $image['image-title'];
      $imageToUpdate->save();
      return redirect('/admin/'.$category->category_slug.'/bildes')->with('success', 'Atjaunots!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroy(Request $image)
  {
    try {
      $imageToDelete = Image::findOrFail($image['image-id']);
      $imageToDelete->delete();
      Storage::delete('public/uploads/'.$imageToDelete->category->category_slug.'/'.$imageToDelete->image_name);
      return back()->with('success', 'Bilde izdzēsta!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }
}
