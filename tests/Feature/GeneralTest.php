<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneralTest extends TestCase
{
  use RefreshDatabase;

  public function test_homepage_works(): void
  {
    $this->get('/')->assertStatus(200);
  }

  public function test_portfolio_works(): void
  {
    $this->get('/portfolio')->assertStatus(200);
  }

  public function test_purchase_works(): void
  {
    $this->get('/purchase')->assertStatus(200);
  }

  public function test_bio_works()
  {
    $this->get('/bio')->assertStatus(200);
  }

  public function test_artist_statement_works()
  {
    $this->get('/artist-statement')->assertStatus(200);
  }

  public function test_cv_works()
  {
    $this->get('/cv')->assertStatus(200);
  }

  public function test_contact_me_works()
  {
    $this->get('/contact-me')->assertStatus(200);
  }
}
