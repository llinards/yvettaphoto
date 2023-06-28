<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

    // Create a user
    $user = User::factory()->create();

    // Log in the user
    $this->actingAs($user);

    Storage::fake('public');
    $file = UploadedFile::fake()->image('home-bg.jpg');
    $response = $this->post('/admin/titulbilde/jauna', [
      'single-img-upload' => $file
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/admin');
//      dd($response);
    Storage::disk('public')->assertExists("uploads/cover_photos/home-bg.jpg");
  }
}
