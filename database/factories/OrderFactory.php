<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'address2' => $this->faker->secondaryAddress,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'zip' => $this->faker->postcode,
        ];
    }
}
