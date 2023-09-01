<?php

namespace Tests\Feature;

use App\News;
use App\NewsImage;
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

  public function test_edit_news_can_be_opened(): void
  {
    News::factory(1)->create()->each(function ($news) {
      $news->images()->createMany(
        NewsImage::factory(rand(1, 2))->make()->toArray()
      );
    });
    $news = News::first();

    $this->actingAs($this->user);
    $response = $this->get('/admin/zinas/'.$news->id.'/edit');

    $response->assertStatus(200);

    foreach ($news->images as $image) {
      Storage::disk('public')->delete('uploads/news/'.$image->image_location);
    }

  }

  public function test_news_can_be_destroyed(): void
  {
    News::factory(1)->create()->each(function ($news) {
      $news->images()->createMany(
        NewsImage::factory(rand(1, 2))->make()->toArray()
      );
    });
    $news = News::first();

    $this->actingAs($this->user);
    $response = $this->delete('/admin/zinas/'.$news->id.'/delete');

    $response->assertStatus(302);
    $response->assertSessionHas('success', 'Ziņa izdzēsta!');

    $this->assertDatabaseMissing('news', [
      'id' => $news->id,
    ]);
    $this->assertDatabaseMissing('news_images', [
      'news_id' => $news->id,
    ]);
    foreach ($news->images as $image) {
      $this->assertFileDoesNotExist(Storage::disk('public')->path('uploads/news/'.$image->image_location));
    }
  }

  public function test_news_can_be_created(): void
  {
    $this->actingAs($this->user);

    $file = UploadedFile::fake()->image('test.jpg');

    $fileTempUpload = $this->post('/admin/upload', [
      'multiple-img-upload' => [$file]
    ]);

    $response = $this->post('/admin/zinas', [
      'news-title' => 'Test category',
      'news-description' => 'Test description',
      'multiple-img-upload' => [$fileTempUpload->content()]
    ]);
    $response->assertRedirect('/admin');
    $response->assertSessionHas('success', 'Ziņa pievienota!');

    $this->assertDatabaseHas('news', [
      'title' => 'Test category'
    ]);

    $this->assertDatabaseHas('news_images', [
      'news_id' => News::first()->id,
      'image_location' => basename($fileTempUpload->content())
    ]);

    Storage::disk('public')->assertExists('uploads/news/'.basename($fileTempUpload->content()));

    Storage::disk('public')->delete('uploads/news/'.basename($fileTempUpload->content()));
  }
}
