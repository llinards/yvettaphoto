<?php

namespace App\Services;

use App\News;
use App\NewsImage;

class NewsService
{
  private object $news;

  public function addNews(object $data): void
  {
    $this->news = News::create([
      'title' => $data['news-title'],
      'description' => $data['description-textarea']
    ]);
  }

  public function addImage(string $image): void
  {
    $fileService = new FileService();
    $this->news->images()->create([
      'image_location' => basename($image)
    ]);
    $fileService->storeFile($image, 'uploads/news');
  }

  public function updateNews(object $data): void
  {
    $this->news = News::findOrFail($data['news-id']);
    $this->news->update([
      'title' => $data['news-title'],
      'description' => $data['description-textarea']
    ]);
  }

  public function destroyImage(object $data): void
  {
    $fileService = new FileService();
    $image = NewsImage::findOrFail($data['id']);
    $fileService->destroyFile($data['image_location'], 'uploads/news');
    $image->delete();
  }

  public function destroyNews(object $data): void
  {
    $this->news = News::findOrFail($data['id']);
    $this->news->delete();
  }
}
