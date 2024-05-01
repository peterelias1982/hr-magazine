<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    public function industryInsights1(){

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
            $query->where('articleCategoryName', 'Feature Articles');
        })->get();

        $news = Article::where('approved', 1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Industry News');
        })
        ->latest()
        ->take(4)
        ->get();
    $updates = Article::where('approved', 1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Industry Updates');
        })
        ->latest()
        ->take(6)
        ->get();
    $latestFeatures = Article::where('approved', 1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Feature Articles');
        })
        ->latest()
        ->take(1)
        ->get();
    
        return view('publicPages.articles.professionalDevelopment1',compact('features' ,'news', 'updates', 'latestFeatures'));
    }

    public function professionalDevelopment2(){

        $latestExpertInterviews = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Expert Interviews');
        })
        ->latest()
        ->take(4)
        ->get();

        $expertInterviews = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Expert Interviews');
        })
        ->take(4)
        ->get();

        $professionalsSpotlights = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Professionals Spotlights');
        })
        ->latest()
        ->take(7)
        ->get();

        $journeyToexcellences = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Journey to Excellence');
        })
        ->orderByRaw("RAND()") // random order
        ->take(5)
        ->get(); 
   
        return view('publicPages.articles.professionalDevelopment2', compact('latestExpertInterviews' , 'expertInterviews' , 'professionalsSpotlights' , 'journeyToexcellences'));
    }

    public function professionalDevelopment3(){

        $trainingAndDevelopments = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Training & Development');
        })
        ->latest()
        ->take(1)
        ->get();

        $legalCorners = Article::where('approved',1)
        ->whereHas('articleCategory', function ($query) {
            $query->where('articleCategoryName', 'Legal Corner') ;
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
            $query->where('articleCategoryName', 'Mental Health in the Workplace') ;
        })
        ->latest()
        ->take(4)
        ->get();
        
    

    $wellnessPrograms = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('articleCategoryName', 'Wellness Programs') ;
    })
    ->latest()
    ->take(4)
    ->get();

    $hrDiversities = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('articleCategoryName', 'Diversity, Equity, and Inclusion (DEI)') ;
    })
    ->latest()
    ->take(4)
    ->get();

    $workplaceCultures = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('articleCategoryName', 'Workplace Culture') ;
    })
    // ->orderByRaw("RAND()") // random order
    ->latest()
        ->take(3)
        ->get(); 

        $latestWorkplaceCultures = Article::where('approved',1)
    ->whereHas('articleCategory', function ($query) {
        $query->where('articleCategoryName', 'Workplace Culture') ;
    })
    ->latest()
    ->take(1)
    ->get();

  
    // $authors= Author::where('id', $data['author_id'])->first();
    $authors=Author::get();




return view('publicPages.articles.workPlaceCultureAndWellBeing' , compact('mentalHealthInTheWorkplaces' , 'wellnessPrograms' , 'hrDiversities' ,'workplaceCultures', 'latestWorkplaceCultures' , 'authors'));
}

}
