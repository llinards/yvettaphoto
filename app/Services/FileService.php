<?php

namespace App\Services;

use App\Image;
use Illuminate\Support\Str;
use Storage;

class FileService
{
  public function storeCoverPhoto(object $data): void
  {
    $coverPhoto = $data['single-img-upload'];
    Storage::disk('public')->move($coverPhoto, 'uploads/cover_photos/home-bg.jpg');
  }

  public function storeCategoryCoverPhoto(object $data): string
  {
    $categorySlug = Str::slug($data['category-name']);
    $photo = $data['single-img-upload'];
    $categoryCoverPhotoUrl = 'uploads/'.$categorySlug.'/'.basename($photo);
    Storage::disk('public')->move($photo, $categoryCoverPhotoUrl);
    return $categoryCoverPhotoUrl;
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

  public function storeCategoryPhotos(string $image, string $categorySlug): string
  {
    $imageUrl = 'uploads/'.$categorySlug.'/'.basename($image);
    Storage::disk('public')->move($image, $imageUrl);
    return $imageUrl;
  }
}
