<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\YoutubeLink;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    public function industryInsights1(){

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
        ->take(1)
        ->get();
    return view('publicPages.articles.industryInsights1', compact('news', 'updates', 'latestNews'));

        
    }

    public function industryInsights2(){
        
        return view('publicPages.articles.industryInsights2');
    }

    public function industryInsights3(){
        
        return view('publicPages.articles.industryInsights3');
    }

    public function ladiesInHR(){
        
        return view('publicPages.articles.ladiesInHR');
    }

    public function legalCompliance(){
        
        return view('publicPages.articles.legalCompliance');
    }

    public function professionalDevelopment1(){

        $features = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Feature Articles');
        })->get();

        $news = Article::where('approved', 1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Industry News');
        })
        ->latest()
        ->take(4)
        ->get();
    $updates = Article::where('approved', 1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Industry Updates');
        })
        ->latest()
        ->take(6)
        ->get();
    $latestFeatures = Article::where('approved', 1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Feature Articles');
        })
        ->latest()
        ->take(1)
        ->get();
    
        return view('publicPages.articles.professionalDevelopment1',compact('features' ,'news', 'updates', 'latestFeatures'));
    }

    public function professionalDevelopment2(){

        $latestExpertInterviews = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Expert Interviews');
        })
        ->latest()
        ->take(1)
        ->get();

        $expertInterviews = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Expert Interviews');
        })
        ->take(4)
        ->get();

        $professionalsSpotlights = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Professionals Spotlights');
        })
        ->latest()
        ->take(7)
        ->get();

        $journeyToexcellences = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Journey to Excellence');
        })
        ->latest() // random order
        ->take(5)
        ->get(); 

        $authors=Author::get();

        $articleCategories = ArticleCategory::get();

        $youtubeLinks = YoutubeLink::first();
        return view('publicPages.articles.professionalDevelopment2', compact('latestExpertInterviews' , 'expertInterviews' , 'professionalsSpotlights' , 'journeyToexcellences' , 'articleCategories' ,'youtubeLinks'));
    }

    public function professionalDevelopment3(){

        $trainingAndDevelopments = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Training & Development');
        })
        ->latest()
        ->take(1)
        ->get();
        

        $legalCorners = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Legal Corner') ;
        })
        ->latest()
        ->take(5)
        ->get();

        $authors =  Author::where('bio',1)->get();
        
        
        return view('publicPages.articles.professionalDevelopment3', compact('trainingAndDevelopments' , 'legalCorners', 'authors'));
    }

    public function workPlaceCultureAndWellBeing(){


        $mentalHealthInTheWorkplaces = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('subCategory', 'Mental Health in the Workplace') ;
        })
        ->latest()
        ->take(4)
        ->get();
        
    

    $wellnessPrograms = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('subCategory', 'Wellness Programs') ;
    })
    ->latest()
    ->take(4)
    ->get();

    $hrDiversities = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('subCategory', 'Diversity, Equity, and Inclusion (DEI)') ;
    })
    ->latest()
    ->take(4)
    ->get();

    $workplaceCultures = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('subCategory', 'Workplace Culture') ;
    })
    // ->orderByRaw("RAND()") // random order
    ->latest()
        ->take(3)
        ->get(); 

        $latestWorkplaceCultures = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('subCategory', 'Workplace Culture') ;
    })
    ->latest()
    ->take(1)
    ->get();

  
    // $authors= Author::where('id', $data['author_id'])->first();
    $authors=Author::get();




return view('publicPages.articles.workPlaceCultureAndWellBeing' , compact('mentalHealthInTheWorkplaces' , 'wellnessPrograms' , 'hrDiversities' ,'workplaceCultures', 'latestWorkplaceCultures' , 'authors'));
}

}
