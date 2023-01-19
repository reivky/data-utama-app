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
        return [
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->randomElement(['5000', '15000', '10000', '20000', '1500']),
            'stock' => mt_rand(50, 101),
            'description' => $this->faker->sentence(5),
        ];
    }
}
