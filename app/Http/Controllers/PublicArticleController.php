<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

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

    public function single(string $category, string $article)
    {
        $categoryData = ArticleCategory::where('slug', $category)->first();

        $articleData = DB::table('articles')
            ->leftJoin('authors', 'authors.id', '=', 'articles.author_id')
            ->leftJoin('users', 'users.id', '=', 'authors.user_id')
            ->leftJoin('youtube_links', 'articles.id', '=', 'youtube_links.article_id')
            ->leftJoin('source_articles', 'source_articles.article_id' , '=', 'articles.id')
            ->where("articles.slug", $article)
            ->select('*', 'users.image as userImage', 'articles.image as image', 'articles.created_at as created_at')
            ->first();


        return view('publicPages.articles.articleSingle', compact('categoryData', 'articleData'));
    }

}
