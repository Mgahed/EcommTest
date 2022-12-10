<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // get brands ids
        $brands = \App\Models\Brand::all()->pluck('id')->toArray();
        return [
            'Title' => $this->faker->sentence(3),
            'SKU' => $this->faker->unique()->randomNumber(8),
            'Details' => $this->faker->paragraph(3),
            'Price' => $this->faker->randomFloat(2, 10, 1000),
            'brand_id' => $this->faker->randomElement($brands),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
