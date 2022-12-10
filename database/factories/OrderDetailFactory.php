<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // get first 10 ids of orders
        $orders = Order::limit(10)->get()->pluck('id')->toArray();
        // get all products ids
        $products = \App\Models\Product::all()->pluck('id')->toArray();
        return [
            'unit_price' => $this->faker->randomFloat(2, 1, 1000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'discount' => 0,
            // random from 1 to 500000
            'order_id' => 1,
//            'order_id' => $this->faker->randomElement($orders),
            'product_id' => $this->faker->randomElement($products),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
