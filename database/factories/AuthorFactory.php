<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        // "image"=> fake()->imageUrl(640, 480, 'animals', true),
        // "approved"=>fake()->numberBetween(0,1),
        // "bio"=>fake()->numberBetween(0,1),
        // "description"=>fake()->text(),
        // "user_id"=> fake()->numberBetween(1, 10)
        'image' => $this->faker->imageUrl(),
            'approved' => $this->faker->boolean(90), // 90% chance of being approved
            'description' => $this->faker->paragraph(3),
            // No need to set 'bio' as it defaults to 1
            'user_id' => \App\Models\User::factory(), // Assuming model name for users is "User"
        ];
    }
}
