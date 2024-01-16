<?php

namespace App\Services;

use Storage;

class FileService
{
  public function storeFile(string $file, string $location, bool $isCoverPhoto = false): void
  {
    if ($isCoverPhoto) {
      Storage::disk('public')->move($file, $location.'/home-bg.jpg');
      return;
    }
    Storage::disk('public')->move($file, $location.'/'.basename($file));
  }

  public function moveDirectory(string $oldDirectory, string $newDirectory): void
  {
    Storage::disk('public')->makeDirectory($newDirectory);
    Storage::disk('public')->move($oldDirectory, $newDirectory);
  }

  public function destroyFile(string $file, string $location): void
  {
    Storage::disk('public')->delete($location.'/'.$file);
  }

  public function destroyDirectory(string $location): void
  {
    Storage::disk('public')->deleteDirectory($location);
  }

// old code

  public function storePhotos(string $image, string $categorySlug): string
  {
    $imageUrl = 'uploads/'.$categorySlug.'/'.basename($image);
    Storage::disk('public')->move($image, $imageUrl);
    return $imageUrl;
  }
}
