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

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
  }

  public function test_single_image_temporary_upload(): void
  {
    Storage::fake('public');
    $this->actingAs($this->user);
    $response = $this->post(route('image_temporary.store'), [
      'single-image' => UploadedFile::fake()->image('single-file.jpg')
    ]);

    $response->assertStatus(200);

    Storage::disk('public')->assertExists($response->content());
  }

  public function test_multiple_image_temporary_upload(): void
  {
    Storage::fake('public');
    $this->actingAs($this->user);

    $response = $this->post(route('image_temporary.store'), [
      'multiple-images' => [
        UploadedFile::fake()->image('multiple-file-one.jpg'),
        UploadedFile::fake()->image('multiple-file-two.jpg')
      ],
    ]);

    $response->assertStatus(200);
    Storage::disk('public')->assertExists($response->content());
  }
}
