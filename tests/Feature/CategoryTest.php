<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
    Storage::fake();
  }

  public function test_create_category_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get('/admin/kategorijas');

    $response->assertStatus(200);
  }

  public function test_category_list_cannot_be_accessed_without_login(): void
  {
    $response = $this->get('/admin/kategorijas');

    $response->assertRedirect('/login');
  }

  public function test_new_category_view_can_be_opened(): void
  {
    $this->actingAs($this->user);
    $response = $this->get('/admin/kategorijas/jauna');

    $response->assertStatus(200);
  }
}
