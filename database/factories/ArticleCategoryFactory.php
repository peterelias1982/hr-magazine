<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleCategory>
 */
class ArticleCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'articleCategoryName' => fake()->word(),
            // 'hasComments'=>fake()->numberBetween(0,1),
            // 'hasYoutubeLink'=>fake()->numberBetween(0,1),
            // 'hasAuthor'=>fake()->numberBetween(0,1),
            // 'hasSource'=>fake()->numberBetween(0,1),
            'articleCategoryName' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'hasComments' => $this->faker->boolean(50), // 50% chance of having comments
            'hasSource' => $this->faker->boolean(70),  // 70% chance of having a source
            'hasYoutubeLink' => $this->faker->boolean(30), // 30% chance of having a YouTube link
            'hasAuthor' => $this->faker->boolean(90),  // 90% chance of having an author
        ];
    }
}
