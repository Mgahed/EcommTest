<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // get all users ids
        $users = \App\Models\User::all()->pluck('id')->toArray();
        // get all status
        $status = config('global.ORDER.STATUS');
        return [
            'user_id' => $this->faker->randomElement($users),
            'status' => $this->faker->randomElement(array_keys($status)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
