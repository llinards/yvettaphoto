<?php

namespace App\Services;

use App\Image;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as InterventionImage;
use Storage;

class FileService
{
  public function storeCoverPhoto(object $data): void
  {
    $coverPhoto = $data['single-img-upload'];
    Storage::disk('public')->move($coverPhoto, 'uploads/cover_photos/home-bg.jpg');
  }

  public function resizeImage(object $data): void
  {
    InterventionImage::make("storage/".$data['single-img-upload'])->resize(600, 600)->save();
  }

  public function storeCategoryCoverPhoto(object $data): string
  {
    $categorySlug = Str::slug($data['category-name']);
    $photo = $data['single-img-upload'];
    $categoryCoverPhoto = 'uploads/'.$categorySlug.'/'.basename($photo);
    Storage::disk('public')->move($photo, $categoryCoverPhoto);
    return $categoryCoverPhoto;
  }

  public function destroyCategoryCoverPhoto(string $coverPhotoUrl): void
  {
    Storage::disk('public')->delete($coverPhotoUrl);
  }

  public function updateCategoryDirectory($newCategorySlug, $oldCategorySlug): void
  {
    Storage::disk('public')->makeDirectory('uploads/'.$newCategorySlug);
    Storage::disk('public')->move('uploads/'.$oldCategorySlug, 'uploads/'.$newCategorySlug);
  }

  public function updateCategoryImageDirectory($image, $newCategorySlug): void
  {
    $imageToUpdate = Image::findOrFail($image->id);
    $imageToUpdate->image_name = 'uploads/'.$newCategorySlug.'/'.basename($image->image_name);
    $imageToUpdate->save();
  }
}
