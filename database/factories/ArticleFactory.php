<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => fake()->word(),
            // 'image'=> fake()->imageUrl(640, 480, 'animals', true),
            // 'content'=>fake()->text(),           
            // 'approved'=>fake()->numberBetween(0,1),
            // 'category_id'=> fake()->numberBetween(1, 10),
            // 'user_id'=> fake()->numberBetween(1, 10),
            // 'author_id'=> fake()->numberBetween(1, 10),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'image' => $this->faker->imageUrl(),
            'content' => $this->faker->paragraph(5),
            'category_id' => \App\Models\ArticleCategory::factory(), // Assuming model name for categories is "ArticleCategory"
            'user_id' => \App\Models\User::factory(), // Assuming model name for users is "User"
            'author_id' => \App\Models\Author::factory(), // Assuming model name for authors is "Author"
            'approved' => $this->faker->boolean(80), // 80% chance of being approved
        ];
    }
}
