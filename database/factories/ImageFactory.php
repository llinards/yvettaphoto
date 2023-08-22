<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Image>
 */
class ImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'category_id' => 0,
      'image_name' => $this->faker->image(storage_path('app/public/uploads/'.'slug',),
        rand(600, 1440), rand(600, 1440), 'cities', false),
    ];
  }
}
