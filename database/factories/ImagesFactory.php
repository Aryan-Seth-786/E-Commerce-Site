<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'path' => "https://api.unsplash.com/photos/random",
            'name' => fake()->text(15),
            'price' => fake()->numberBetween(10,100),
            'heat' => fake()->numberBetween(1,3)
        ];
    }
}
