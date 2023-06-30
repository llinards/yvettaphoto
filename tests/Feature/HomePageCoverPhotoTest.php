<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HomePageCoverPhotoTest extends TestCase
{
  use RefreshDatabase;

  /**
   * A basic feature test example.
   */
  public function test_if_home_page_cover_photo_exists(): void
  {
    Storage::disk('local')->assertExists("public/uploads/cover_photos/home-bg.jpg");
  }

  public function test_if_home_page_cover_photo_can_be_changed(): void
  {
    $user = User::factory()->create();
    $this->actingAs($user);

    Storage::fake('public');
    $file = UploadedFile::fake()->image('image.jpg');
    $fileTempUpload = $this->post('/admin/upload', [
      'single-img-upload' => $file
    ]);

    Storage::disk('public')->assertExists($fileTempUpload->content());

    $response = $this->post('/admin/titulbilde/jauna', [
      'single-img-upload' => $fileTempUpload->content()
    ]);

    Storage::disk('public')->assertExists("uploads/cover_photos/home-bg.jpg");
  }
}
