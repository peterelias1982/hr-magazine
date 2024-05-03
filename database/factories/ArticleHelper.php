<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleComment;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;
use App\Traits\Files;

class ArticleHelper
{
    use Files;
    protected static function generateYoutubeLink($article_id, $category_id)
    {
        YoutubeLink::create([
            'YoutubeLink' => 'https://www.youtube.com/embed/6-KKYdaNcl0?si=6r0sg_I8BrSG3OJk',
            'category_id' => $category_id,
            'article_id' => $article_id,
        ]);
    }

    protected static function generateSourceArticle($article_id, $category_id)
    {
        SourceArticle::create([
            'sourceName' => fake()->name(),
            'sourceLink' => fake()->url(),
            'category_id' => $category_id,
            'article_id' => $article_id,
        ]);
    }

    protected static function generateComment($article_id, $category_id)
    {
        ArticleComment::create([
            'content' => fake()->text(100),
            'parentComment' => null,
            'user_id' => fake()->numberBetween(1, 5),
            'category_id' => $category_id,
            'article_id' => $article_id,
        ]);
    }

    public static function generateArticle()
    {
        $category_id = fake()->numberBetween(1, 17);
        $category = ArticleCategory::find($category_id);

        $allImages = ArticleHelper::getFilesFromDir(public_path('assets/images/articles'));

        $article = Article::create([
            'title' => fake()->name(),
            'image' => fake()->randomElement($allImages),
            'content' => fake()->text(1500),
            'category_id' => $category_id,
            'author_id' => ($category->hasAuthor) ? fake()->numberBetween(1, 5) : null,
            'approved' => fake()->numberBetween(0, 1),
            'featured' => fake()->numberBetween(0, 1),
            'recommended' =>  fake()->numberBetween(0, 1),
        ]);

        if($category->hasComments) {
            self::generateComment($article->id, $category_id);
        }

        if($category->hasSource) {
            self::generateSourceArticle($article->id, $category_id);
        }

        if($category->hasYoutubeLink) {
            self::generateYoutubeLink($article->id, $category_id);
        }
    }
}
