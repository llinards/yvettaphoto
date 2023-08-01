<?php

namespace App\Services;

use Storage;

class FileService
{
  public function storeCoverPhoto($data): void
  {
    $coverPhoto = $data['single-img-upload'];
    Storage::disk('public')->move($coverPhoto, 'uploads/cover_photos/home-bg.jpg');
  }
}
