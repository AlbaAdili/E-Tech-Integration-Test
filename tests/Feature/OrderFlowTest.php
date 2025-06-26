<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_all_orders()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();

        // Orders by regular user
        Order::factory()->count(2)->create(['user_id' => $user->id]);

        $response = $this->actingAs($admin)->get('/orders');

        $response->assertStatus(200);
        $response->assertViewIs('orders');
        $response->assertViewHas('orders');
        $this->assertCount(2, $response->viewData('orders'));
    }

    public function test_user_can_only_view_their_orders()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        Order::factory()->create(['user_id' => $user->id]);
        Order::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->get('/orders');

        $response->assertStatus(200);
        $orders = $response->viewData('orders');
        $this->assertCount(1, $orders);
        $this->assertEquals($user->id, $orders->first()->user_id);
    }
}
