<?php

namespace Database\Seeders;

use App\Category;
use App\Image;
use App\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $faker = app(Generator::class);

    User::factory(1)->create();
    Category::factory(5)->create()
      ->each(function ($category) {
        Image::factory(10)->create([
          'category_id' => $category->id,
          'image_name' => 'needs to be added'
        ]);
      });
  }
}
