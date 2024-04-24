<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Employer;
use App\Models\JobCategory;
use App\Models\JobDetail;
use App\Models\JobSeeker;
use App\Models\Tag;
use Database\Factories\AgendaFactory;
use Database\Factories\ArticleHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        required data for production
        $this->call([
            ArticleCategorySeeder::class,
            SocialMediaSeeder::class,
            AdminSeeder::class
        ]);

//      fake data for testing in development
        Admin::factory(2)->create();
        Author::factory(5)->create();
        Employer::factory(5)->create();
        JobSeeker::factory(5)->create();

        for ($i = 1; $i <= 5; $i++) {
            AgendaFactory::createAgenda();
            ArticleHelper::generateArticle();
        }

        JobCategory::factory(5)->create();
        JobDetail::factory(5)->create();
        DB::table('job_applieds')->insert([
            [
                'jobDetail_id' => 1,
                'jobSeeker_id' => 1,
            ],
            [
                'jobDetail_id' => 1,
                'jobSeeker_id' => 2,
            ],
            [
                'jobDetail_id' => 2,
                'jobSeeker_id' => 1,
            ],
            [
                'jobDetail_id' => 1,
                'jobSeeker_id' => 3,
            ],
        ]);

        Tag::factory(20)->create();
        DB::table('article_tags')->insert([
            [
                'tag_id' => 1,
                'article_id' => 1,
            ],
            [
                'tag_id' => 2,
                'article_id' => 1,
            ],
            [
                'tag_id' => 10,
                'article_id' => 1,
            ],
            [
                'tag_id' => 5,
                'article_id' => 2,
            ],
            [
                'tag_id' => 2,
                'article_id' => 4,
            ]
        ]);

        DB::table('user_media')->insert([
           [
               'user_id' => 2,
               'social_id' => 1,
               'value' => 'linkedin.com'
           ],
            [
                'user_id' => 2,
                'social_id' => 2,
                'value' => 'facebook.com'
            ],
            [
                'user_id' => 5,
                'social_id' => 1,
                'value' => 'linkedin.com'
            ],
            [
                'user_id' => 10,
                'social_id' => 1,
                'value' => 'linkedin.com'
            ],
            [
                'user_id' => 7,
                'social_id' => 1,
                'value' => 'linkedin.com'
            ]
        ]);

    }
}
