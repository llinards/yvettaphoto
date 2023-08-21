<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
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
    $categoryName = $this->faker->unique()->words(2, true);
    $categorySlug = Str::slug($categoryName);
    Storage::disk('public')->makeDirectory('uploads/'.$categorySlug);
    return [
      'name' => $categoryName,
      'category_slug' => $categorySlug,
      'cover_photo_url' => $this->faker->image(storage_path('app/public/uploads/'.$categorySlug),
        600, 600, 'cities',
        false),
      'created_at' => Carbon::now(),
    ];
  }
}
