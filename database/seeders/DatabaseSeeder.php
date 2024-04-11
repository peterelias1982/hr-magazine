<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Author;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // ArticleCategory::factory(10)->create();
        // Article::factory(10)->create();
        // User::factory(10)->create();
        // Author::factory(10)->create();
        // Admin::factory(10)->create();
        // Tag::factory(10)->create();
        ArticleTag::factory(10)->create();
    }
}
