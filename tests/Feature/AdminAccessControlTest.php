<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessControlTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_protected_routes()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get('/product')->assertStatus(200);
        $this->actingAs($admin)->get('/contacts')->assertStatus(200);
    }

    public function test_user_cannot_access_protected_routes()
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)->get('/product')->assertRedirect('/');
        $this->actingAs($user)->get('/contacts')->assertRedirect('/');
    }

    public function test_guest_cannot_access_admin_routes()
    {
        $this->get('/product')->assertRedirect('/');
        $this->get('/contacts')->assertRedirect('/');
    }

}
