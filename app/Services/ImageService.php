<?php

namespace App\Services;

use Intervention\Image\Facades\Image as InterventionImage;

class ImageService
{
  public function resizeImage(object $data): void
  {
    InterventionImage::make("storage/".$data['single-img-upload'])->resize(600, 600)->save();
  }

  public function getImageExifData(string $imageUrl): ?array
  {
    $exifData = InterventionImage::make("storage/{$imageUrl}")->exif();
    if (isset($exifData['Model'])) {
      return $this->setImageExifData($exifData);
    }
    return null;
  }

  protected function setImageExifData(array $exifData): array
  {
    return [
      'Model' => $exifData['Model'],
      'Make' => $exifData['Make'],
      'ISOSpeedRatings' => $exifData['ISOSpeedRatings'],
      'FNumber' => $exifData['FNumber'],
      'ExposureTime' => $exifData['ExposureTime'],
    ];
  }
}
