<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->name,
      'email' => $this->faker->unique()->safeEmail,
      'email_verified_at' => now(),
      'password' => '$2y$10$Q3/mwd.K.PtDrg3U/yeXUetbI4o4EPbMTm/hj.bk68Hy8xJ0/l6Y2', // password
      'remember_token' => Str::random(10),
    ];
  }
}
