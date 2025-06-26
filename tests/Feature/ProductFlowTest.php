<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_shop_page_loads()
    {
        $response = $this->get('/shop');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_product()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->post(route('product.store'), [
            'name' => 'Keyboard',
            'price' => 49.99,
            'quantity' => 10,
        ]);

        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseHas('products', ['name' => 'Keyboard']);
    }

    public function test_admin_can_update_product()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->put(route('product.update', $product->id), [
            'name' => 'Updated Product',
            'price' => 59.99,
            'quantity' => 5,
        ]);

        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseHas('products', ['name' => 'Updated Product']);
    }

    public function test_admin_can_delete_product()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->delete(route('product.destroy', $product->id));
        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    /*public function test_user_can_search_product()
    {
        Product::factory()->create(['name' => 'Laptop']);

        $response = $this->get('/product/search?search=Laptop');
        $response->assertStatus(200);
        $response->assertSee('Laptop');
    }*/

    public function test_add_to_cart_functionality()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
    
        $response = $this->actingAs($user)->get("/book/{$product->id}");
        $response->assertRedirect();
        $this->assertNotEmpty(session('cart'));
    }
    
}
