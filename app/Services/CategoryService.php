<?php

namespace App\Services;

use App\Category;
use Illuminate\Support\Str;

class CategoryService
{
  private string $slug;
  private object $category;

  private function setSlug(string $slug): void
  {
    $this->slug = Str::slug($slug);
  }

  public function getSlug(): string
  {
    return $this->slug;
  }

  public function addCategory(object $data): void
  {
    $this->setSlug($data['category-name']);
    $this->category = Category::create([
      'name' => $data['category-name'],
      'description' => $data['category-description'],
      'category_slug' => $this->slug,
      'cover_photo_url' => basename($data['single-img-upload']),
    ]);
  }

  public function addImage(string $image): void
  {
    if ($image !== null) {
      $fileService = new FileService();
      $fileService->storeFile($image, 'uploads/'.$this->slug);
    }
  }

  public function resizeImage(string $image): void
  {
    $imageService = new ImageService();
    $imageService->resizeImage($image);
  }
}
