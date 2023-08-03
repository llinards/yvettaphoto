<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Category>
 */
class CategoryFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    //TODO: In progress
    $categoryName = $this->faker->unique()->sentence(2);
    $categorySlug = Str::slug($categoryName);
//    Storage::disk('public')->makeDirectory('uploads/'.$categorySlug);
    return [
      'name' => $categoryName,
      'category_slug' => $categorySlug,
      'cover_photo_url' => $this->faker->image(storage_path('uploads/'.$categorySlug), 640, 480, 'animals', true),
//      'cover_photo_url' => $this->faker->imageUrl(640, 480, 'animals'),
      'created_at' => Carbon::now(),

      //uploads/beau-vazquez/jbBujuNWwsbVxtPyIQI5bEL1CIlE9BNSETX8jZnz.jpg
    ];
  }
}
