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

  public function testSingleImageUploadWorks(): void
  {
    $image = UploadedFile::fake()->image('image.jpg');
    $response = $this->uploadImage('single-img-upload', $image);

    $response->assertStatus(200);
    $this->assertImageExistsInStorage($response->content());
    $this->deleteImage($response->content());
  }

  public function testMultipleImageUploadWorks(): void
  {
    $image = UploadedFile::fake()->image('image.jpg');
    $response = $this->uploadImage('multiple-img-upload', [$image]);

    $response->assertStatus(200);
    $this->assertImageExistsInStorage($response->content());
    $this->deleteImage($response->content());
  }

  private function uploadImage($fileKey, $image)
  {
    $this->actingAs($this->user);
    return $this->post('/admin/upload', [
      $fileKey => $image,
    ]);
  }

  private function deleteImage(string $imageLocation): void
  {
    Storage::disk('public')->delete($imageLocation);
  }

  private function assertImageExistsInStorage(string $imageLocation): void
  {
    Storage::disk('public')->assertExists($imageLocation);
  }
}
