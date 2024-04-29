<?php


use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\SingleArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('publicPages.events.singleEvent');
});

Route::get('/home', function () {
    return view('publicPages.home');
})->name('index');

Auth::routes();

// article routes
Route::group(['prefix' => "articles", "controller" => PublicArticleController::class, "as" => "articles."], function () {
    //articles
    Route::get("/industryInsights1", "industryInsights1")->name('industryInsights1');
    Route::get("/industryInsights2", "industryInsights2")->name('industryInsights2');
    Route::get("/industryInsights3", "industryInsights3")->name('industryInsights3');
    Route::get("/ladiesInHR", "ladiesInHR")->name('ladiesInHR');
    Route::get("/legalCompliance", "legalCompliance")->name('legalCompliance');
    Route::get("/professionalDevelopment1", "professionalDevelopment1")->name('professionalDevelopment1');
    Route::get("/professionalDevelopment2", "professionalDevelopment2")->name('professionalDevelopment2');
    Route::get("/professionalDevelopment3", "professionalDevelopment3")->name('professionalDevelopment3');
    Route::get("/workPlaceCultureAndWellBeing", "workPlaceCultureAndWellBeing")->name('workPlaceCultureAndWellBeing');


    Route::group(['prefix' => "single", "controller" => SingleArticleController::class, "as" => "singleArticle."], function () {
        Route::get("/authorSingle", "authorSingle")->name('authorSingle');
        Route::get("/diversityEqualityAndInclusionSingle", "diversityEqualityAndInclusionSingle")->name('diversityEqualityAndInclusionSingle');
        Route::get("/expertInterviewsSingle", "expertInterviewsSingle")->name('expertInterviewsSingle');
        Route::get("/featureArticlesSingle", "featureArticlesSingle")->name('featureArticlesSingle');
        Route::get("/globalHRPrespectivesSingle", "globalHRPrespectivesSingle")->name('globalHRPrespectivesSingle');
        Route::get("/HRCaseStudiesSingle", "HRCaseStudiesSingle")->name('HRCaseStudiesSingle');
        Route::get("/industryNewsAndUpdatesSingle", "industryNewsAndUpdatesSingle")->name('industryNewsAndUpdatesSingle');
        Route::get("/industryTrendsAndInsightsSingle", "industryTrendsAndInsightsSingle")->name('industryTrendsAndInsightsSingle');
        Route::get("/journeyToExcellenceSingle", "journeyToExcellenceSingle")->name('journeyToExcellenceSingle');
        Route::get("/ladiesIntreviewsSingle", "ladiesIntreviewsSingle")->name('ladiesIntreviewsSingle');
        Route::get("/legalComplianceSingle", "legalComplianceSingle")->name('legalComplianceSingle');
        Route::get("/mentalHealthInWorkplaceSingle", "mentalHealthInWorkplaceSingle")->name('mentalHealthInWorkplaceSingle');
        Route::get("/professionalSpotlightsSingle", "professionalSpotlightsSingle")->name('professionalSpotlightsSingle');
        Route::get("/trainingAndDevelopmentSingle", "trainingAndDevelopmentSingle")->name('trainingAndDevelopmentSingle');
        Route::get("/wellnessProgramsSingle", "wellnessProgramsSingle")->name('wellnessProgramsSingle');
        Route::get("/workplaceCultureSingle", "workplaceCultureSingle")->name('workplaceCultureSingle');






       

    });

    
});




