<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class PublicArticleController extends Controller
{
    public function industryInsights1()
    {
        $news = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry News');
            })
            ->latest()
            ->get();

        $updates = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry Updates');
            })
            ->latest()
            ->get();


        return view('publicPages.articles.industryInsights1', compact('news', 'updates'));
    }

    public function industryInsights2()
    {
        $trends = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry Trends');
            })
            ->latest()
            ->get();

        $insights = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry Insights');
            })
            ->latest()
            ->get();

        return view('publicPages.articles.industryInsights2', compact('trends', 'insights'));
    }

    public function industryInsights3()
    {
        $news = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry News');
            })
            ->latest()
            ->get();

        $perspectives = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Global HR Perspectives');
            })
            ->latest()
            ->get();

        return view('publicPages.articles.industryInsights3', compact('news', 'perspectives'));
    }

    public function ladiesInHR()
    {
        $journeyToExcellences = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Journey to Excellence');
            })
            ->latest()
            ->get();

        $caseStudies = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Case Studies');
            })
            ->latest()
            ->get();

        $ladiesInterviews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Ladies Interviews');
            })
            ->latest()
            ->get();

        return view('publicPages.articles.ladiesInHR', compact('journeyToExcellences', 'caseStudies', 'ladiesInterviews'));
    }

    public function legalCompliance()
    {
        $legalCompliances = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Legal Corner');
            })
            ->latest()
            ->get();

        return view('publicPages.articles.legalCompliance', compact('legalCompliances'));
    }

    public function professionalDevelopment1()
    {
        $features = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Feature Articles');
            })
            ->latest()
            ->get();

        $recommends = Article::where('approved', 1)
            ->where('recommended', 1)
            ->latest()
            ->take(6)
            ->get();

        return view('publicPages.articles.professionalDevelopment1', compact('features', 'recommends'));
    }

    public function professionalDevelopment2()
    {
        $expertInterviews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Expert Interviews');
            })
            ->latest()
            ->get();

        $professionalsSpotlights = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Professional Spotlights');
            })
            ->latest()
            ->get();

        return view('publicPages.articles.professionalDevelopment2', compact('expertInterviews', 'professionalsSpotlights'));
    }

    public function professionalDevelopment3()
    {

        $trainingAndDevelopments = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Training and Development');
            })
            ->latest()
            ->get();

        $authors = Author::where('bio', 1)->get();

        return view('publicPages.articles.professionalDevelopment3', compact('trainingAndDevelopments', 'authors'));
    }

    public function workPlaceCultureAndWellBeing()
    {
        $mentalHealthInTheWorkplaces = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Mental Health in the Workplace');
            })
            ->latest()
            ->get();

        $wellnessPrograms = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Wellness Programs');
            })
            ->latest()
            ->get();

        $hrDiversities = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Diversity, Equity, and Inclusion (DEI)');
            })
            ->latest()
            ->get();

        $workplaceCultures = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Workplace Culture');
            })
            ->latest()
            ->get();

            

        return view('publicPages.articles.workPlaceCultureAndWellBeing', compact('mentalHealthInTheWorkplaces', 'wellnessPrograms', 'hrDiversities', 'workplaceCultures'));
    }

    public function articleSingle(string $category, string $article)
    {
        try {
            $categoryData = ArticleCategory::where('slug', $category)->first();

            $articleData = DB::table('articles')
                ->leftJoin('authors', 'authors.id', '=', 'articles.author_id')
                ->leftJoin('users', 'users.id', '=', 'authors.user_id')
                ->leftJoin('youtube_links', 'articles.id', '=', 'youtube_links.article_id')
                ->leftJoin('source_articles', 'source_articles.article_id', '=', 'articles.id')
                ->where("articles.slug", $article)
                ->where("articles.approved", '=', 1)
                ->select('*', 'users.image as userImage', 'articles.image as image', 'articles.created_at as created_at', 'users.slug as userSlug', 'articles.id as articleId')
                ->first();

            if (!$categoryData || !$articleData) {
                throw new ResourceNotFoundException('Resource not found');
            }

            $comments = null;

            if ($categoryData->hasComments) {
                $comments = (new CommentsController())->showArticleComments($articleData->articleId);
            }

            return view('publicPages.articles.articleSingle',
                compact('categoryData', 'articleData', 'comments'));

        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Error: ' . $exception->getMessage()]])]);
        }
    }

    public function authorSingle(string $author)
    {
        try {
            $authorData = DB::table('authors')
                ->join('users', 'users.id', '=', 'authors.user_id')
                ->where('authors.bio', '=', 1)
                ->where('users.slug', '=', $author)
                ->select('authors.*', 'users.firstName', 'users.secondName', 'users.position', 'users.image')
                ->first();

            if (!$authorData) {
                throw new ResourceNotFoundException('Resource not found');
            }

            $authorArticles = DB::table('articles')
                ->join('article_categories', 'article_categories.id', '=', 'articles.category_id')
                ->where('articles.approved', '=', 1)
                ->where('articles.author_id', '=', $authorData->id)
                ->select('articles.title', 'articles.slug as articleSlug', 'article_categories.slug as categorySlug')
                ->get();

            $authorMedia = DB::table('user_media')
                ->join('social_media', 'social_media.id', '=', 'user_media.social_id')
                ->where('user_media.user_id', '=', $authorData->user_id)
                ->get();

            return view('publicPages.articles.authorSingle', compact('authorData', 'authorArticles', 'authorMedia'));
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Error: ' . $exception->getMessage()]])]);
        }
    }

}
