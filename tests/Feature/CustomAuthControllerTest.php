<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomAuthControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post(route('login.custom'), [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home.index'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_sign_out_with_302_redirect()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('signout.custom'));

        $response->assertStatus(302);

        $response->assertRedirect(route('home.index'));

        $this->assertGuest();
    }

}
