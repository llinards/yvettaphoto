<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\NewsImage>
 */
class NewsImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    if (!Storage::disk('public')->exists('uploads/news')) {
      Storage::disk('public')->makeDirectory('uploads/news');
    }
    return [
      'image_location' => $this->faker->image(storage_path('app/public/uploads/news'),
        rand(600, 1440), rand(600, 1440), 'cities',
        false),
    ];
  }
}
