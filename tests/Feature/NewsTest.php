<?php

namespace Tests\Feature;

use App\News;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
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

  public function test_news_index_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get(route('news.index'));

    $response->assertStatus(200);
  }

  public function test_create_news_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get(route('news.create'));

    $response->assertStatus(200);
  }

  public function test_news_can_be_created(): void
  {
    Storage::fake('public');
    $this->actingAs($this->user);
    $file = $this->uploadMultipleImages(UploadedFile::fake()->image('test.jpg', 1920, 1080));
    $response = $this->post(route('news.store'), [
      'news-title' => 'Test News',
      'description-textarea' => 'Description for test news',
      'multiple-images' => [$file]
    ]);

    $response->assertSessionHas([
      'success' => 'Ziņa pievienota!'
    ]);

    Storage::disk('public')->assertExists('uploads/news/'.basename($file));

    $this->assertDatabaseHas('news', [
      'title' => 'Test News',
      'description' => 'Description for test news'
    ]);

    $this->assertDatabaseHas('news_images', [
      'news_id' => News::first()->id,
      'image_location' => basename($file),
    ]);
  }

  public function test_validation_when_creating_news(): void
  {
    $this->actingAs($this->user);
    $response = $this->post(route('news.store'), [
      'news-title' => '',
      'description-textarea' => '',
      'multiple-images' => []
    ]);

    $response->assertSessionHasErrors([
      'news-title' => 'Nav ievadīts virsraksts!',
      'description-textarea' => 'Nav ievadīts teksts!',
      'multiple-images' => 'Nav pievienotas bildes!'
    ]);
  }

  public function test_validation_when_title_is_longer_than_100_characters(): void
  {
    $this->actingAs($this->user);
    $response = $this->post(route('news.store'), [
      'news-title' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,',
    ]);

    $response->assertSessionHasErrors([
      'news-title' => 'Virsrakts ir pārāk garš! Maksimālais simbolu skaits ir 100.',
    ]);
  }

  public function test_created_news_visible_on_news_page(): void
  {
    //TODO: Double check if this doesn't give false positive
    Storage::fake('public');
    News::factory(1)->create();
    $news = News::first();
    $response = $this->get('/news');

    $response->assertSeeText($news->title);
  }


  private function uploadMultipleImages(UploadedFile $file): string
  {
    $response = $this->post(route('image_temporary.store'), [
      'multiple-images' => [$file],
    ]);
    return $response->content();
  }
}
