<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryImage;
use App\Http\Requests\StoreImageRequest;
use App\Services\FileService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
  public function index(Category $category)
  {
    return view('admin.photos.index', compact('category'));
  }

  public function store(StoreImageRequest $data, FileService $fileService, ImageService $imageService)
  {
    try {
      $categoryId = $data['category-id'];
      $categorySlug = Category::findOrFail($categoryId)->category_slug;
      foreach ($data['multiple-images'] as $image) {
        $imageUrl = $fileService->storePhotos($image, $categorySlug);
        $exifData = $imageService->getImageExifData($imageUrl);

        $newImage = new CategoryImage();
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

  public function update(Request $image)
  {
    try {
      $imageToUpdate = CategoryImage::findOrFail($image['id']);
      $imageToUpdate->alt_attribute = $image['image-alt-attribute'];
      $imageToUpdate->title = $image['image-title'];
      $imageToUpdate->save();
      return back()->with('success', 'Atjaunots!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }

  public function destroy(CategoryImage $image)
  {
    try {
      $imageToDelete = CategoryImage::findOrFail($image['id']);
      $imageToDelete->delete();
      Storage::delete('public/uploads/'.$imageToDelete->category->category_slug.'/'.$imageToDelete->image_name);
      return back()->with('success', 'Bilde izdzēsta!');
    } catch (\Exception $e) {
      Log::error($e);
      return back()->with('error', 'Kļūda!');
    }
  }
}
