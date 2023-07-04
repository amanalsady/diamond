<?php

namespace Database\Factories;

use App\Models\Brand;
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
            'name' => fake()->name,
            'image' => fake()->imageUrl,
            'price' => fake()->randomNumber(3),
            'disccount' => fake()->randomNumber(2),
            'code' => fake()->text(6),
            'brand_id' => rand(1, Brand::count()),
        ];
    }
}
