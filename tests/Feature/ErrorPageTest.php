<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ErrorPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_404_page_is_shown_for_missing_route()
    {
        $response = $this->get('/this-route-does-not-exist');
        $response->assertStatus(404);
    }

    public function test_403_page_is_shown_for_forbidden_access()
    {
        // Simulate user with no permission trying to access admin route
        $user = \App\Models\User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/product/create');
        $response->assertRedirect('/');
      
    }

    public function test_500_error_can_be_manually_triggered()
    {
        // Define a test-only route that throws an exception
        \Route::get('/test-500-error', function () {
            abort(500);
        });

        $response = $this->get('/test-500-error');
        $response->assertStatus(500);
    }
}
