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

  public function getCategory(string $id): object
  {
    return Category::findOrFail($id);
  }

  public function addCategory(object $data): void
  {
    $this->setSlug($data['category-name']);
    $this->category = Category::create([
      'name' => $data['category-name'],
      'description' => $data['description-textarea'],
      'category_slug' => $this->slug,
      'cover_photo_url' => basename($data['single-image']),
    ]);
  }

  public function addImage(string $image): void
  {
    if ($image !== null) {
      $fileService = new FileService();
      $fileService->storeFile($image, 'uploads/'.$this->slug);
    }
  }

  //TODO: Should be optimized further
  public function updateCategory(object $data): void
  {
    $fileService = new FileService();
    $this->category = $this->getCategory($data['category-id']);
    $this->setSlug($data['category-name']);
    $categoryCoverImage = isset($data['single-image']) ? basename($data['single-image']) : $this->category->cover_photo_url;
    $isSlugChanged = $this->category->category_slug !== $this->slug;
    $isCategoryCoverImageChanged = $this->category->cover_photo_url !== $categoryCoverImage;
    if ($isSlugChanged) {
      $fileService->moveDirectory('uploads/'.$this->category->category_slug, 'uploads/'.$this->slug);
    }
    if ($isCategoryCoverImageChanged) {
      $fileService->destroyFile($this->category->cover_photo_url, 'uploads/'.$this->slug);
    }
    $this->category->update([
      'name' => $data['category-name'],
      'description' => $data['description-textarea'],
      'category_slug' => $this->slug,
      'cover_photo_url' => $categoryCoverImage,
    ]);
  }

  public function destroyCategory(object $data): void
  {
    $this->category = $this->getCategory($data['id']);
    $fileService = new FileService();
    $fileService->destroyDirectory('uploads/'.$this->category->category_slug);
    $this->category->delete();
  }

  public function resizeImage(string $image): void
  {
    $imageService = new ImageService();
    $imageService->resizeImage($image);
  }
}
