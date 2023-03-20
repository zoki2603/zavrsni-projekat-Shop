<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => fake()->word(),
            'price' => fake()->numberBetween(10, 1000),
            'image' => fake()->image(),
            'description' => fake()->paragraph(1),
            'quantity' => fake()->numberBetween(0, 100),
            'category_id' => Category::factory()
        ];
    }
}
