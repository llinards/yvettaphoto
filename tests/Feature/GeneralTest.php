<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneralTest extends TestCase
{
  use RefreshDatabase;

  /**
   * @dataProvider provideRoutes
   */
  public function test_routes_work($route): void
  {
    $this->get($route)->assertStatus(200);
  }

  public static function provideRoutes(): array
  {
    return [
      'Homepage' => ['/'],
      'Portfolio' => ['/portfolio'],
      'Purchase' => ['/purchase'],
      'Bio' => ['/bio'],
      'Artist Statement' => ['/artist-statement'],
      'CV' => ['/cv'],
      'Contact Me' => ['/contact-me'],
    ];
  }
}
