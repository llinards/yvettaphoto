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
      'name' => 'Linards',
      'email' => 'linards@linards.com',
      'email_verified_at' => now(),
      'password' => bcrypt('password'),
      'remember_token' => Str::random(10),
    ];
  }
}
