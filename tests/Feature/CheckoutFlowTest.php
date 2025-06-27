<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_checkout_page()
    {
        $user = User::factory()->create();
        session(['cart' => []]);

        $response = $this->actingAs($user)->get('/checkout');

        $response->assertStatus(200);
        $response->assertViewIs('checkout');
    }

    public function test_user_can_complete_checkout()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['quantity' => 10]);

        $cart = [
            $product->id => [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 2,
                'image' => $product->image,
            ],
        ];

        session(['cart' => $cart]);

        $response = $this->actingAs($user)->post('/checkout', [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john@example.com',
            'address' => '123 Main St',
            'address2' => '',
            'country' => 'USA',
            'city' => 'New York',
            'zip' => '10001',
        ]);

        $response->assertRedirect(route('product.orderConfirmation'));

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'email' => 'john@example.com',
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $this->assertEmpty(session('cart'));
    }
}
