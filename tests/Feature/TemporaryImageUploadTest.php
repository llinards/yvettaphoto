<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class TemporaryImageUploadTest extends TestCase
{
  use RefreshDatabase;

  protected function setUp(): void
  {
    parent::setUp();
    $user = User::factory()->create();
    $this->actingAs($user);
  }

  public function test_single_image_temporary_upload(): void
  {
    Storage::fake('public');
    $file = UploadedFile::fake()->image('single-file.jpg');
    $response = $this->post(route('image_temporary.store'), [
      'single-image' => $file
    ]);

    $response->assertStatus(200);
    Storage::disk('public')->assertExists($response->content());
  }

  public function test_multiple_image_temporary_upload(): void
  {
    Storage::fake('public');
    $files = [
      UploadedFile::fake()->image('multiple-file-one.jpg'),
      UploadedFile::fake()->image('multiple-file-two.jpg')
    ];

    $uploadedFiles = [];
    foreach ($files as $file) {
      $response = $this->post(route('image_temporary.store'), [
        'multiple-images' => [$file],
      ]);

      $response->assertStatus(200);
      $uploadedFiles[] = json_decode($response->getContent());
    }

    foreach ($uploadedFiles as $uploadedFile) {
      Storage::disk('public')->assertExists($uploadedFile);
    }
  }
}
