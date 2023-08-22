<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\News>
 */
class NewsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->sentence(),
      'description' => $this->faker->paragraph(),
      'created_at' => Carbon::now()->subMinutes(rand(1, 55)),
      'updated_at' => Carbon::now()->subMinutes(rand(1, 55)),
    ];
  }
}
