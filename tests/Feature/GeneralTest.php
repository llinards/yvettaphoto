<?php

namespace Tests\Feature;

use Tests\TestCase;

class GeneralTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_only_admin_can_see_dashboard()
  {
    $this->get('/admin')->assertRedirect('/login');
  }

  public function test_page_works()
  {
    $this->get('/')->assertStatus(200);
  }
}
