<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'tagName'=> fake()->word(),
            'tagName' => $this->faker->unique()->word(), // Ensure unique tag names
            'slug' => $this->faker->slug(),
        ];
    }
}
