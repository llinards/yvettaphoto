<?php

namespace Database\Seeders;

use App\Category;
use App\User;
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
    User::factory(1)->create();
    Category::factory(1)->create();
//    News::factory(5)->create()->each(function ($news) {
//      $news->images()->createMany(
//        NewsImage::factory(rand(1, 2))->make()->toArray()
//      );
//    });
  }
}
