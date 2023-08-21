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
    Category::factory(5)->create();
//    foreach (Category::all() as $category) {
//      Image::factory(5)->create();
//    }
  }
}
