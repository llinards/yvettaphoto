<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function only_logged_in_users_can_see_all_categories()
    {
        $response = $this->get('/admin/kategorijas')->assertRedirect('/login');
    }

    /** @test */
    public function user_added_new_category()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/admin/kategorijas', [
            'category-name' => 'Test Category',
            'category-description' => '<p>Test Category</p>'
        ]);

        $this->assertCount(1, Category::all());
    }
}
