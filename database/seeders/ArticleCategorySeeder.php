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
            'articleCategoryName' => 'Industry Insights',
            'subCategory' => 'Industry News and Updates',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Industry Insights',
            'subCategory' => 'Trends and Insights',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Industry Insights',
            'subCategory' => 'Global HR Perspectives',
            'hasComments' => 0,
            'hasSource' => 1,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 0,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Professional Development',
            'subCategory' => 'Feature Articles',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Professional Development',
            'subCategory' => 'Expert Interviews',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 1,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Ladies in HR',
            'subCategory' => 'Ladies Interviews',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 1,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Professional Development',
            'subCategory' => 'Professional Spotlights',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Professional Development',
            'subCategory' => 'Training and Development',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Ladies in HR',
            'subCategory' => 'Case Studies',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Ladies in HR',
            'subCategory' => 'Journey to Excellence',
            'hasComments' => 0,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Legal and Compliance',
            'subCategory' => 'Legal Corner',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Workplace Culture and Well-being',
            'subCategory' => 'Workplace Culture',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Workplace Culture and Well-being',
            'subCategory' => 'Diversity, Equity, and Inclusion (DEI)',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Workplace Culture and Well-being',
            'subCategory' => 'Wellness Programs',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
        ArticleCategory::create([
            'articleCategoryName' => 'Workplace Culture and Well-being',
            'subCategory' => 'Mental Health in the Workplace',
            'hasComments' => 1,
            'hasSource' => 0,
            'hasYoutubeLink' => 0,
            'hasAuthor' => 1,
            'canModified' => 0,
        ]);
    }
}
