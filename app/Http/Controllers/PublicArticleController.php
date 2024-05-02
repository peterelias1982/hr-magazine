<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    public function industryInsights1()
    {
        $news = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Industry News');
            })->get();
        $updates = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Industry Updates');
            })->get();
        $latestNews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Industry News');
            })
            ->latest()
            ->take(1)
            ->get();

        return view('publicPages.articles.industryInsights1', compact('news', 'updates', 'latestNews'));
    }

    public function industryInsights2()
    {
        $trends = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Trends');
            })->get();
        $insights = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Insights');
            })->get();
        $latestTrends = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Trends');
            })
            ->latest()
            ->take(1)
            ->get();

        return view('publicPages.articles.industryInsights2', compact('trends', 'insights', 'latestTrends'));
    }

    public function industryInsights3()
    {
        $news = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Industry News');
            })->get();
        $perspectives = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Global HR Perspectives');
            })->get();
        $latestPerspectives = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Global HR Perspectives');
            })
            ->latest()
            ->take(1)
            ->get();

        return view('publicPages.articles.industryInsights3', compact('news', 'perspectives', 'latestPerspectives'));
    }

    public function ladiesInHR()
    {
        $expertInterviews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Expert Interviews');
            })->get();
        $journeyToExcellences = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Journey to Excellence');
            })->get();
        $caseStudies = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Case Studies');
            })->get();
        $latestLadiesInterviews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Ladies Interviews');
            })
            ->latest()
            ->take(1)
            ->get();

        return view('publicPages.articles.ladiesInHR', compact('expertInterviews', 'journeyToExcellences', 'caseStudies', 'latestLadiesInterviews'));
    }

    public function legalCompliance()
    {
        $legalCompliances = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Legal Corner');
            })->get();
        $latestLegalCompliances = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('articleCategoryName', 'Legal Corner');
            })
            ->latest()
            ->take(1)
            ->get();

        return view('publicPages.articles.legalCompliance', compact('legalCompliances', 'latestLegalCompliances'));
    }
    public function professionalDevelopment1()
    {

        return view('publicPages.articles.professionalDevelopment1');
    }
    public function professionalDevelopment2()
    {

        return view('publicPages.articles.professionalDevelopment2');
    }
    public function professionalDevelopment3()
    {

        return view('publicPages.articles.professionalDevelopment3');
    }
}
