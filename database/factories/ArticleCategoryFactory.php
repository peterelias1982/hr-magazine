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
            'articleCategoryName' => fake()->word(),
            'hasComments'=>fake()->numberBetween(0,1),
            'hasYoutubeLink'=>fake()->numberBetween(0,1),
            'hasAuthor'=>fake()->numberBetween(0,1),
            'hasSource'=>fake()->numberBetween(0,1),
        ];
    }
}
