<?php

namespace App\Services;

use App\News;

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
}
