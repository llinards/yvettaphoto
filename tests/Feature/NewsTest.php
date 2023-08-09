<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class NewsTest extends TestCase
{
  use RefreshDatabase;

  protected function createAdminUser(): void
  {
    $user = User::factory()->create();
    $this->actingAs($user);
  }

  public function test_news_can_be_created(): void
  {
    $this->createAdminUser();

    Storage::fake('public');
    $file[] = UploadedFile::fake()->image('image.jpg');
    //TODO: Šo vajadzētu uz Unit testiem pārlikt
    $fileTempUpload = $this->post('/admin/upload', [
      'multiple-img-upload' => $file
    ])->assertStatus(200);

    Storage::disk('public')->assertExists($fileTempUpload->content());

    $this->post('/admin/zinas', [
      'news-title' => 'Test category',
      'news-description' => 'Test description',
      'multiple-img-upload' => $fileTempUpload->content()
    ])->assertRedirect('/admin');
  }
}
