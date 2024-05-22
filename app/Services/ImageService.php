<?php

namespace App\Services;

use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
  public function resizeImage(string $image): void
  {
    Image::read("storage/".$image)->resize(600, 600)->save();
  }

  public function getImageExifData(string $imageUrl): ?array
  {
    $exifData = Image::read("storage/{$imageUrl}")->exif();
    if ($exifData->get('IFD0.Model')) {
      return $this->setImageExifData($exifData);
    }
    return null;
  }

  protected function setImageExifData(object $exifData): array
  {
    return [
      'Model' => $exifData->get('IFD0.Model'),
      'Make' => $exifData->get('IFD0.Make'),
      'ISOSpeedRatings' => $exifData->get('EXIF.ISOSpeedRatings'),
      'FNumber' => $exifData->get('EXIF.FNumber'),
      'ExposureTime' => $exifData->get('EXIF.ExposureTime'),
    ];
  }
}
