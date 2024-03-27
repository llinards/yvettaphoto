<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class CategoryTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
  }

  public function test_categories_index_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get(route('categories.index'));

    $response->assertStatus(200);
  }

  public function test_create_category_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get(route('categories.create'));

    $response->assertStatus(200);
  }

  public function test_new_category_can_be_created(): void
  {
    $this->markTestIncomplete();
    Storage::fake('public');
    $this->actingAs($this->user);
    $file = $this->uploadSingleImage(UploadedFile::fake()->image('test.jpg', 1920, 1080));
    $response = $this->post(route('categories.store'), [
      'category-name' => 'Test Category',
      'description-textarea' => 'This is a test description for category',
      'single-image' => $file
    ]);

//    Intervention\Image\Exception\NotReadableException: Image source not readable


    $response->assertSessionHas([
      'success' => 'Kategorija pievienota!'
    ]);
  }

  public function test_validation_when_creating_new_category(): void
  {
    $this->actingAs($this->user);
    $response = $this->post(route('categories.store'), [
      'category-name' => '',
      'single-image' => ''
    ]);

    $response->assertSessionHasErrors([
      'category-name' => 'Nav norādīts kategorijas nosaukums.',
      'single-image' => 'Nav pievienota kategorijas titulbilde.'
    ]);
  }

  public function test_created_category_visible_on_portfolio_page(): void
  {
    $this->markTestIncomplete();
//    Cannot write to directory
    Storage::fake('public');
    $testCategory = Category::factory(1)->create();
    $response = $this->get('/portfolio');

    $response->assertViewHas('user', function (Category $category) use ($testCategory) {
      return $category->name === $testCategory->name;
    });
  }

  private function uploadSingleImage(UploadedFile $file): string
  {
    $response = $this->post(route('image_temporary.store'), [
      'single-image' => $file,
    ]);
    return $response->content();
  }
}
