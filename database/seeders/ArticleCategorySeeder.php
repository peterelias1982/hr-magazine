<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ArticleCategory::create([
            'articleCategoryName' => 'Industry News',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
        ]);

        ArticleCategory::create([
            'articleCategoryName' => 'Industry Updates',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Trends',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Insights',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Global HR Perspectives',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Feature Articles',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Expert Interviews',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 1,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Ladies Interviews',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 1,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Professionals Spotlights',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Training and Development',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Case Studies',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Journey to Excellence',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Legal Corner',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Workplace Culture',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Diversity, Equity, and Inclusion (DEI)',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Wellness Programs',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Mental Health in the Workplace',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
        ]);
    }
}