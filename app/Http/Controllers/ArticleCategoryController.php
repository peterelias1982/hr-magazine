<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryArticleRequest;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query=ArticleCategory::Query();
        $request=Request();
        if($search=$request->Catergory){
            $query->where("articleCategoryName","LIKE","%$search%");
        }
        $Categories=$query->get();
        return view("Admin.article.allCategory",compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.article.addCategory");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryArticleRequest $request)
    {
        $data["articleCategoryName"]=$request["articleCategoryName"];
        $data['hasComments']=isset($request['hasComments']);
        $data['hasSource']=isset($request['hasSource']);
        $data['hasYoutubeLink']=isset($request['hasYoutubeLink']);
        $data['hasAuthor']=isset($request['hasAuthor']);
        ArticleCategory::create($data);
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryArticleRequest $request,$slug,$id)
    {
        $CategoryArticle=ArticleCategory::where("slug",$slug);
        $data["articleCategoryName"]=$request["articleCategoryName"];
        $data['hasComments']=isset($request['hasComments']);
        $data['hasSource']=isset($request['hasSource']);
        $data['hasYoutubeLink']=isset($request['hasYoutubeLink']);
        $data['hasAuthor']=isset($request['hasAuthor']);
        $CategoryArticle->update($data);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {

        ArticleCategory::where("slug",$slug)->delete();
        //  Session::flash('success', 'Deleted: ' . $slug . ' done sucessfuly!');
         return redirect()->back();
    }
}
