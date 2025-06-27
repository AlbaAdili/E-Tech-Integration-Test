<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_cart_item_quantity()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create(['quantity' => 10]);

        $this->actingAs($user)->get("/book/{$product->id}");

        // Update quantity
        $response = $this->actingAs($user)->patch('/update-shopping-cart', [
            'id' => $product->id,
            'quantity' => 3,
        ]);

        $response->assertStatus(200);
        $this->assertEquals(3, session("cart.{$product->id}.quantity"));
    }

    public function test_user_can_remove_item_from_cart()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        // Remove from cart
        $this->actingAs($user)->get("/book/{$product->id}");

        $response = $this->actingAs($user)->delete('/delete-cart-product', [
            'id' => $product->id,
        ]);

        $response->assertStatus(200);
        $this->assertArrayNotHasKey($product->id, session('cart'));
    }

    public function test_checkout_total_price_is_correct()
    {
        $user = User::factory()->create();
        $product1 = Product::factory()->create(['price' => 100]);
        $product2 = Product::factory()->create(['price' => 200]);

        $this->actingAs($user)->get("/book/{$product1->id}");
        $this->actingAs($user)->get("/book/{$product2->id}");

        session()->put('cart', [
            $product1->id => ['name' => $product1->name, 'quantity' => 2, 'price' => 100, 'image' => $product1->image],
            $product2->id => ['name' => $product2->name, 'quantity' => 1, 'price' => 200, 'image' => $product2->image],
        ]);

        $response = $this->actingAs($user)->get('/checkout');
        $response->assertStatus(200);
        $response->assertViewHas('totalCartPrice', 400); // 2*100 + 1*200
    }
}
