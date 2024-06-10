<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class CategoryImageTest extends TestCase
{
  use RefreshDatabase;

  protected function setUp(): void
  {
    parent::setUp();
    $user = User::factory()->create();
    $this->actingAs($user);
  }

  public function test_category_images_index_can_be_opened(): void
  {
    $this->markTestIncomplete();
    Storage::fake('public');
    $category = Category::factory()->create();

    $response = $this->get(route('category.images.index', $category));

    $response->assertStatus(200);
  }

  private function uploadMultipleImages(UploadedFile $file): string
  {
    $response = $this->post(route('image_temporary.store'), [
      'multiple-images' => [$file],
    ]);
    $response->assertStatus(200);
    return $response->content();
  }
}
