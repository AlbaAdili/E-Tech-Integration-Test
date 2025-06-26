<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 5, 1000),
            'quantity' => $this->faker->numberBetween(1, 20),
            'image' => 'images/sample.png', // Default or fake path
        ];
    }
}
