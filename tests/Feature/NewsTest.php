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
    $this->markTestSkipped('In progress...');
    $this->actingAs($this->user);

    Storage::fake('public');
    $file[] = UploadedFile::fake()->image('test.jpg');

    $fileTempUpload = $this->post('/admin/upload', [
      'multiple-img-upload' => $file
    ])->assertStatus(200);

    dd($fileTempUpload);

    Storage::disk('public')->assertExists($fileTempUpload->content());

    $response = $this->post('/admin/zinas', [
      'news-title' => 'Test category',
      'news-description' => 'Test description',
      'multiple-img-upload' => $fileTempUpload->content()
    ]);
  }
}
