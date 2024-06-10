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
    $this->actingAs($this->user);
  }

  public function test_only_authenticated_users_can_see_dashboard(): void
  {
    auth()->logout();
    $response = $this->get('/admin');

    $response->assertStatus(302);
    $response->assertRedirect('/login');
  }

  public function test_authenticated_users_can_see_dashboard(): void
  {
    $response = $this->get('/admin');

    $response->assertStatus(200);
  }

  public function test_authenticated_users_can_logout(): void
  {
    $response = $this->post('/logout');

    $response->assertRedirect('/');
    $this->assertGuest();
  }

  public function test_login_form_rejects_invalid_data(): void
  {
    auth()->logout();
    $response = $this->post('/login', [
      'email' => 'not-an-email',
      'password' => 'short'
    ]);

    $response->assertSessionHasErrors(['email']);
  }
}
