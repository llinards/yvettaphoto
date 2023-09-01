<?php

namespace Tests\Feature;

use App\News;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class NewsTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
    Storage::fake();
  }

  public function test_create_news_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get('/admin/zinas/new');

    $response->assertStatus(200);
  }

  public function test_news_can_be_created(): void
  {
    $this->actingAs($this->user);

    $file = UploadedFile::fake()->image('test.jpg');

    $fileTempContent = $this->uploadFileToTemporaryStorage($file);

    $response = $this->createNews([
      'news-title' => 'Test category',
      'news-description' => 'Test description',
      'multiple-img-upload' => [$fileTempContent],
    ]);

    $response->assertRedirect('/admin')
      ->assertSessionHas('success', 'Ziņa pievienota!');

    $this->assertDatabaseHas('news', [
      'title' => 'Test category',
      'description' => 'Test description',
    ]);

    $this->assertDatabaseHas('news_images', [
      'news_id' => News::first()->id,
      'image_location' => basename($fileTempContent),
    ]);

    $this->assertImageExistsInStorage(basename($fileTempContent));

    foreach (News::first()->images as $image) {
      $this->deleteNewsImage($image->image_location);
    }
  }

  public function test_edit_news_can_be_opened(): void
  {
    $news = News::factory()->hasImages(rand(1, 2))->create();

    $this->actingAs($this->user);

    $response = $this->get('/admin/zinas/'.$news->id.'/edit');

    $response->assertStatus(200);

    foreach ($news->images as $image) {
      $this->deleteNewsImage($image->image_location);
    }
  }

  public function test_news_can_be_destroyed(): void
  {
    $news = News::factory()->hasImages(rand(1, 2))->create();

    $this->actingAs($this->user);

    $response = $this->delete('/admin/zinas/'.$news->id.'/delete');

    $response
      ->assertStatus(302)
      ->assertSessionHas('success', 'Ziņa izdzēsta!');

    $this->assertDatabaseMissing('news', ['id' => $news->id]);
    $this->assertDatabaseMissing('news_images', ['news_id' => $news->id]);

    foreach ($news->images as $image) {
      $this->assertFileDoesNotExist(Storage::disk('public')->path('uploads/news/'.$image->image_location));
    }
  }

  private function uploadFileToTemporaryStorage(UploadedFile $file): string
  {
    $response = $this->post('/admin/upload', [
      'multiple-img-upload' => [$file],
    ]);

    return $response->content();
  }

  private function createNews(array $data)
  {
    return $this->post('/admin/zinas', $data);
  }

  private function deleteNewsImage(string $imageLocation): void
  {
    Storage::disk('public')->delete('uploads/news/'.$imageLocation);
  }

  private function assertImageExistsInStorage(string $imageName): void
  {
    Storage::disk('public')->assertExists('uploads/news/'.$imageName);
  }
}
