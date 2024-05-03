<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;

class PublicArticleController extends Controller
{
    public function industryInsights1()
    {
        $news = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry News');
            })->get();
        $updates = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry Updates');
            })->get();
        $latestNews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry News');
            })
            ->latest()
            ->first();

        return view('publicPages.articles.industryInsights1', compact('news', 'updates', 'latestNews'));
    }

    public function industryInsights2()
    {
        $trends = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Trends');
            })->get();
        $insights = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Insights');
            })->get();
        $latestTrends = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Trends');
            })
            ->latest()
            ->first();

        return view('publicPages.articles.industryInsights2', compact('trends', 'insights', 'latestTrends'));
    }

    public function industryInsights3()
    {
        $news = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Industry News');
            })->get();
        $perspectives = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Global HR Perspectives');
            })->get();
        $latestPerspectives = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Global HR Perspectives');
            })
            ->latest()
            ->first();

        return view('publicPages.articles.industryInsights3', compact('news', 'perspectives', 'latestPerspectives'));
    }

    public function ladiesInHR()
    {
        $expertInterviews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Expert Interviews');
            })->get();
        $journeyToExcellences = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Journey to Excellence');
            })->get();
        $caseStudies = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Case Studies');
            })->get();
        $latestLadiesInterviews = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Ladies Interviews');
            })
            ->latest()
            ->first();

        return view('publicPages.articles.ladiesInHR', compact('expertInterviews', 'journeyToExcellences', 'caseStudies', 'latestLadiesInterviews'));
    }

    public function legalCompliance()
    {
        $legalCompliances = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Legal Corner');
            })->get();
        $latestLegalCompliances = Article::where('approved', 1)
            ->whereHas('articleCategory', function ($query) {
                $query->where('subCategory', 'Legal Corner');
            })
            ->latest()
            ->first();

        return view('publicPages.articles.legalCompliance', compact('legalCompliances', 'latestLegalCompliances'));
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

}
