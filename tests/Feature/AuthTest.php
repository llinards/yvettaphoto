<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  protected function setUp(): void
  {
    parent::setUp();
    $this->user = User::factory()->create();
  }

  public function test_only_authenticated_users_can_see_dashboard()
  {
    $response = $this->get('/admin');

    $response->assertStatus(302);
    $response->assertRedirect('/login');
  }

  public function test_authenticated_users_can_see_dashboard()
  {
    $this->actingAs($this->user);
    $response = $this->get('/admin');

    $response->assertStatus(200);
  }
}
