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
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Random product name
            'description' => $this->faker->paragraph(), // Random product description
            'price' => $this->faker->randomFloat(2, 5, 1000), // Random price between 5 and 1000
            'stock' => $this->faker->numberBetween(1, 100), // Random stock between 1 and 100
        ];
    }
}
