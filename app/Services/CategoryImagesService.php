<?php

namespace App\Services;

use App\Category;
use App\CategoryImage;

class CategoryImagesService
{
  public function addImages(object $data): void
  {
    $fileService = new FileService();
    $imageServe = new ImageService();
    $category = Category::findOrFail($data['category-id']);
    foreach ($data['multiple-images'] as $image) {
      $imageLocation = $fileService->storeFile($image, 'uploads/'.$category->category_slug);
      $imageExitData = $imageServe->getImageExifData($imageLocation);
      CategoryImage::create([
        'category_id' => $data['category-id'],
        'image_name' => basename($image),
        'camera_model' => $imageExitData['Model'] ?? 'N/A',
        'camera_make' => $imageExitData['Make'] ?? 'N/A',
        'iso' => $imageExitData['ISOSpeedRatings'] ?? 0,
        'f_number' => $imageExitData['FNumber'] ?? 'N/A',
        'exposure_time' => $imageExitData['ExposureTime'] ?? 'N/A',
      ]);
    }
  }

  public function updateImage(object $data): void
  {
    $image = CategoryImage::findOrFail($data->id);
    $image->update([
      'alt_attribute' => $data['image-alt-attribute'],
      'title' => $data['image-title']
    ]);
  }

  public function destroyImage(object $data): void
  {
    $fileService = new FileService();
    $image = CategoryImage::findOrFail($data->id);
    $fileService->destroyFile($data->image_name, 'uploads/'.$data->category->category_slug);
    $image->delete();
  }
}
