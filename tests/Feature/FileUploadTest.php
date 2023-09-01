<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
  }

  public function test_single_img_upload_works(): void
  {
    $this->actingAs($this->user);
    $file = UploadedFile::fake()->image('image.jpg');
    $response = $this->post('/admin/upload', [
      'single-img-upload' => $file
    ]);

    $response->assertStatus(200);
    Storage::disk('public')->assertExists($response->content());

    Storage::disk('public')->delete($response->content());
  }

  public function test_multiple_img_upload_works(): void
  {
    $this->actingAs($this->user);
    $image = UploadedFile::fake()->image('image.jpg');
    $response = $this->post('/admin/upload', [
      'multiple-img-upload' => [$image]
    ]);

    $response->assertStatus(200);
    Storage::disk('public')->assertExists($response->content());

    Storage::disk('public')->delete($response->content());
  }
}
