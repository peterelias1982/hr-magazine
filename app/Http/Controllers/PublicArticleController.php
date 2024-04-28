<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    public function industryInsights1(){

        return view('publicPages.articles.industryInsights1');
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
        
        return view('publicPages.articles.professionalDevelopment1');
    }

    public function professionalDevelopment2(){
        
        return view('publicPages.articles.professionalDevelopment2');
    }

    public function professionalDevelopment3(){
        
        return view('publicPages.articles.professionalDevelopment3');
    }

    public function workPlaceCultureAndWellBeing(){

        return view('publicPages.articles.workPlaceCultureAndWellBeing');
    }


}
