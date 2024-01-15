<?php

namespace App\Services;

use App\Category;
use Illuminate\Support\Str;

class CategoryService
{
  private string $slug;
  private object $category;
  private string $categoryCoverImage;

  private function setSlug(string $slug): void
  {
    $this->slug = Str::slug($slug);
  }

  public function getSlug(): string
  {
    return $this->slug;
  }

  public function getCategory(string $id): object
  {
    return Category::findOrFail($id);
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

  public function updateCategory(object $data): void
  {
    $fileService = new FileService();
    $this->category = $this->getCategory($data['category-id']);
    $this->setSlug($data['category-name']);
    $this->categoryCoverImage = isset($data['single-img-upload']) ? basename($data['single-img-upload']) : $this->category->cover_photo_url;
    $isSlugChanged = $this->category->category_slug !== $this->slug;
    $isCategoryCoverImageChanged = $this->category->cover_photo_url !== $this->categoryCoverImage;
    if ($isSlugChanged) {
      $fileService->moveDirectory('uploads/'.$this->category->category_slug, 'uploads/'.$this->slug);
    }
    if ($isCategoryCoverImageChanged) {
      $this->destroyImage($this->category->cover_photo_url);
    }
    $this->category->update([
      'name' => $data['category-name'],
      'description' => $data['category-description'],
      'category_slug' => $this->slug,
      'cover_photo_url' => $this->categoryCoverImage,
    ]);
  }
  
  public function resizeImage(string $image): void
  {
    $imageService = new ImageService();
    $imageService->resizeImage($image);
  }

  public function destroyImage(string $image): void
  {
    $fileService = new FileService();
    $fileService->destroyFile($image, 'uploads/'.$this->slug);
  }
}
