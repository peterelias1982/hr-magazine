<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryArticleRequest;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = ArticleCategory::Query();
        $request = Request();
        if ($search = $request->catergory) {
            $query->where("articleCategoryName", "LIKE", "%$search%");
        }
        $categories = $query->get();
        return view("Admin.article.allCategory", compact('categories'));
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
      
       $data=$this->prepareData($request);
        ArticleCategory::create($data);
        return redirect()->route('categories.index');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryArticleRequest $request, $slug)
    {
        $categoryArticle = ArticleCategory::where("slug", $slug)->first();
       $data=$this->prepareData($request);
        $categoryArticle->update($data);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        ArticleCategory::where("slug", $slug)->delete();
        return redirect()->back();
    }
    private function prepareData($request){

        $data["articleCategoryName"] = $request["articleCategoryName"];
        $data['hasComments'] = isset($request['hasComments']);
        $data['hasSource'] = isset($request['hasSource']);
        $data['hasYoutubeLink'] = isset($request['hasYoutubeLink']);
        $data['hasAuthor'] = isset($request['hasAuthor']);
        return $data;
    }
}
