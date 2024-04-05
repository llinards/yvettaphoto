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

  protected function setUp(): void
  {
    parent::setUp();
    $user = User::factory()->create();
    $this->actingAs($user);
  }

  public function test_news_index_can_be_opened(): void
  {

    $response = $this->get(route('news.index'));

    $response->assertStatus(200);
  }

  public function test_create_news_can_be_opened(): void
  {

    $response = $this->get(route('news.create'));

    $response->assertStatus(200);
  }

  public function test_news_can_be_created(): void
  {
    Storage::fake('public');
    $files = [
      UploadedFile::fake()->image('test1.jpg', 1920, 1080),
      UploadedFile::fake()->image('test2.jpg', 1920, 1080)
    ];

    $uploadedFiles = [];
    foreach ($files as $file) {
      $uploadedFiles[] = $this->uploadMultipleImages($file);
    }

    $response = $this->post(route('news.store'), [
      'news-title' => 'Test News',
      'description-textarea' => 'Description for test news',
      'multiple-images' => $uploadedFiles
    ]);

    $response->assertSessionHas([
      'success' => 'Ziņa pievienota!'
    ]);

    foreach ($uploadedFiles as $uploadedFile) {
      Storage::disk('public')->assertExists('uploads/news/'.basename($uploadedFile));
    }

    $this->assertDatabaseHas('news', [
      'title' => 'Test News',
      'description' => 'Description for test news'
    ]);

    foreach ($uploadedFiles as $uploadedFile) {
      $this->assertDatabaseHas('news_images', [
        'news_id' => News::first()->id,
        'image_location' => basename($uploadedFile),
      ]);
    }
  }

  public function test_validation_when_creating_news(): void
  {

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

    $response = $this->post(route('news.store'), [
      'news-title' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,',
    ]);

    $response->assertSessionHasErrors([
      'news-title' => 'Virsrakts ir pārāk garš! Maksimālais simbolu skaits ir 100.',
    ]);
  }

  public function test_created_news_visible_on_news_page(): void
  {
    Storage::fake('public');
    $news = News::factory()->create();
    $response = $this->get('/news');

    $response->assertStatus(200);
    $response->assertSeeText($news->title);
    $response->assertSeeText($news->description);
  }

  public function test_edit_news_can_be_opened(): void
  {
    $news = News::factory()->create();
    $response = $this->get(route('news.edit', $news));

    $response->assertStatus(200);
  }

  public function test_news_can_be_updated(): void
  {
    Storage::fake('public');
    $news = News::factory()->create();
    $files = [
      UploadedFile::fake()->image('test1.jpg', 1920, 1080),
      UploadedFile::fake()->image('test2.jpg', 1920, 1080)
    ];

    $uploadedFiles = [];
    foreach ($files as $file) {
      $uploadedFiles[] = $this->uploadMultipleImages($file);
    }

    $response = $this->patch(route('news.update', $news), [
      'news-id' => $news->id,
      'news-title' => 'Updated News',
      'description-textarea' => 'Updated description for test news',
      'multiple-images' => $uploadedFiles
    ]);

    $response->assertSessionHas([
      'success' => 'Ziņa atjaunota!'
    ]);

    foreach ($uploadedFiles as $uploadedFile) {
      Storage::disk('public')->assertExists('uploads/news/'.basename($uploadedFile));
    }

    $this->assertDatabaseHas('news', [
      'id' => $news->id,
      'title' => 'Updated News',
      'description' => 'Updated description for test news'
    ]);

    foreach ($uploadedFiles as $uploadedFile) {
      $this->assertDatabaseHas('news_images', [
        'news_id' => $news->id,
        'image_location' => basename($uploadedFile),
      ]);
    }
  }

  public function test_validation_when_updating_news(): void
  {
    $news = News::factory()->create();

    $response = $this->patch(route('news.update', $news), [
      'news-id' => $news->id,
      'news-title' => '',
      'description-textarea' => '',
    ]);

    $response->assertSessionHasErrors([
      'news-title' => 'Nav ievadīts virsraksts!',
      'description-textarea' => 'Nav ievadīts teksts!',
    ]);

  }

  public function test_image_can_be_deleted_from_news(): void
  {
    Storage::fake('public');
    $news = News::factory()->create();
    $image = $news->images()->create([
      'image_location' => 'test.jpg'
    ]);

    $response = $this->delete(route('news.image.destroy', $image));

    $response->assertSessionHas([
      'success' => 'Bilde dzēsta'
    ]);

    Storage::disk('public')->assertMissing('uploads/news/test.jpg');

    $this->assertDatabaseMissing('news_images', [
      'id' => $image->id,
      'image_location' => 'test.jpg'
    ]);
  }

  public function test_news_can_be_deleted(): void
  {
    Storage::fake('public');
    $news = News::factory()->create();
    $image = $news->images()->create([
      'image_location' => 'test.jpg'
    ]);

    $response = $this->delete(route('news.destroy', $news));

    $response->assertSessionHas([
      'success' => 'Ziņa izdzēsta!'
    ]);

    Storage::disk('public')->assertMissing('uploads/news/test.jpg');

    $this->assertDatabaseMissing('news', [
      'id' => $news->id,
      'title' => $news->title,
      'description' => $news->description
    ]);

    $this->assertDatabaseMissing('news_images', [
      'id' => $image->id,
      'image_location' => 'test.jpg'
    ]);
  }

  private function uploadMultipleImages(UploadedFile $file): string
  {
    $response = $this->post(route('image_temporary.store'), [
      'multiple-images' => [$file],
    ]);
    $response->assertStatus(200);
    return $response->content();
  }
}
