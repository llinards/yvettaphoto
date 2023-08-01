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

  public function test_if_home_page_cover_photo_can_be_changed(): void
  {
    $user = User::factory()->create();
    $this->actingAs($user);

    Storage::fake('public');
    $file = UploadedFile::fake()->image('image.jpg');
    $fileTempUpload = $this->post('/admin/upload', [
      'single-img-upload' => $file
    ])->assertStatus(200);

    Storage::disk('public')->assertExists($fileTempUpload->content());

    $this->post('/admin/titulbilde/jauna', [
      'single-img-upload' => $fileTempUpload->content()
    ]);

    Storage::disk('public')->assertExists("uploads/cover_photos/home-bg.jpg");
  }

  public function test_if_validations_is_enabled_when_changing_home_page_cover_photo(): void
  {
    $user = User::factory()->create();
    $this->actingAs($user);
    Storage::fake('public');
    $this->post('/admin/titulbilde/jauna', [
      'single-img-upload' => ""
    ])->assertSessionHasErrors(['single-img-upload'])->assertStatus(302);

    Storage::disk('public')->assertMissing("uploads/cover_photos/home-bg.jpg");
  }
}
