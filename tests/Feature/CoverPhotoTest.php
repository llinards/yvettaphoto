<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class CoverPhotoTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
  }

  public function test_user_can_access_change_cover_photo_page(): void
  {
    $response = $this->get(route('admin.cover_photo.create'));

    $response->assertStatus(200);
  }

  public function test_user_can_change_cover_photo(): void
  {
    Storage::fake('public');
    $file = $this->uploadSingleImage(UploadedFile::fake()->image('test.jpg'));

    $response = $this->post(route('admin.cover_photo.store'), [
      'single-image' => $file
    ]);

    $response->assertSessionHas([
      'success' => 'Titulbilde nomainīta!'
    ]);

    Storage::disk('public')->assertExists('uploads/cover_photos/home-bg.jpg');
  }

  /**
   * @dataProvider provideInvalidCoverPhotoData
   */
  public function test_validation_when_changing_cover_photo($data, $expectedError): void
  {
    $response = $this->post(route('admin.cover_photo.store'), $data);

    $response->assertSessionHasErrors($expectedError);
  }

  public static function provideInvalidCoverPhotoData(): array
  {
    return [
      'No image selected' => [[], ['single-image' => 'Nav izvēlēta bilde!']],
    ];
  }

  private function uploadSingleImage(UploadedFile $file): string
  {
    $response = $this->post(route('image_temporary.store'), [
      'single-image' => $file,
    ]);
    return $response->content();
  }
}
