<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageCoverPhotoTest extends TestCase
{
  use RefreshDatabase;

  protected function createAdminUser(): void
  {
    $user = User::factory()->create();
    $this->actingAs($user);
  }
}
