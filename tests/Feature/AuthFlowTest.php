<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Login'); // Adjust to match your view content
    }

    public function test_guest_can_view_registration_form()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Register'); // Adjust to match your view content
    }

    public function test_user_can_register()
    {
        $response = $this->post('/custom-registration', [
            'name' => 'Alba Adili',
            'email' => 'alba@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'alba@example.com',
        ]);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'alba@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/custom-login', [
            'email' => 'alba@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_authenticated_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/custom-signout');

        $response->assertRedirect(route('home.index'));
        $this->assertGuest();
    }
}
