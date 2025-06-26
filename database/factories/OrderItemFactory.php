<?php
namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'product_name' => $this->faker->word,
            'product_price' => $this->faker->randomFloat(2, 10, 100),
            'product_image' => 'images/' . $this->faker->word . '.jpg',
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
