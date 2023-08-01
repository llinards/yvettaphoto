<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
  use RefreshDatabase;

  protected function createAdminUser(): void
  {
    $user = User::factory()->create();
    $this->actingAs($user);
  }

//  public function test_if_category_can_be_created(): void
//  {
//    //TODO: not working with resuzeImage() method
//    $this->createAdminUser();
//
//    Storage::fake('public');
//    $file = UploadedFile::fake()->image('image.jpg');
//    $fileTempUpload = $this->post('/admin/upload', [
//      'single-img-upload' => $file
//    ])->assertStatus(200);
//
//    Storage::disk('public')->assertExists($fileTempUpload->content());
//
//    $this->post('/admin/kategorijas', [
//      'category-name' => 'Test category',
//      'category-description' => 'Test description',
//      'single-img-upload' => $fileTempUpload->content()
//    ])->assertRedirect('/admin/test-category/bildes')->assertStatus(302);
//
//    $this->assertDatabaseHas('categories', [
//      'name' => 'Test category'
//    ]);
//  }
}
