<?php

namespace Database\Seeders;

use App\Category;
use App\CategoryImage;
use App\News;
use App\NewsImage;
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
    $categories = Category::factory(1)->create();
    foreach ($categories as $category) {
      $images = CategoryImage::factory()->withCategory($category->category_slug)->count(10)->make()->toArray();
      $category->images()->createMany($images);
    }
    News::factory(2)->create()->each(function ($news) {
      $news->images()->createMany(
        NewsImage::factory(rand(1, 2))->make()->toArray()
      );
    });
  }
}
