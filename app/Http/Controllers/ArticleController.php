<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use App\Models\User;
use App\Models\Tag;
use App\Models\ArticleComment;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\ArticleTag;
use App\Traits\Common;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Dflydev\DotAccessData\Data;

class ArticleController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articles = Article::get();
        $articleCategories = ArticleCategory::get();
        return view("Admin.article.allArticle", compact(['articles', 'articleCategories']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $authors = User::where('userable_type', Author::class)->select(['id', 'name'])->get();
        $articleCategories = ArticleCategory::select(['id', 'articleCategoryName', 'hasAuthor', 'hasSource', 'hasYoutubeLink'])->get();
        $articleTags = Tag::select('id', 'tagName')->get();

        return view("Admin.article.addArticle", compact(['articleCategories', 'articleTags', 'authors']));;
        // $articleTags = Tag::select('id', 'tagName')->get();

        // return view("Admin.article.addArticle", compact(['articleCategories', 'articleTags', 'authors']));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        [$articleData, $tagsAttachments, $articleables] =
        $this->prepareData($request->all());

        $article = Article::create($articleData);

        $article->tags()->attach($tagsAttachments);

        foreach ($articleables as $articleable) {
            $articleable['article_id'] = $article->id;

            $articleable->save();
            $articleable->articles()->save($article);
        }

        return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $articles = Article::where('slug', $slug)->first();
        $articleCategories = ArticleCategory::get();
        $authors = User::where('userable_type', Author::class)->select(['id', 'name'])->get();
        $articleTags = ArticleTag::get();
        $sourceArticles = SourceArticle::get();
        $youtubeLinks = YoutubeLink::get();
        return view('admin.article.articleDetails', compact('articles', 'articleCategories', 'authors', 'articleTags', 'sourceArticles', 'youtubeLinks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::where('id', $id)->delete();    // softdelete
        return redirect('admin/allArticle');
    }

    private function prepareData(array $data)
    {
        $fileName = $this->uploadFile($data["image"], 'assets/images/');

        $articleData = [
            'title' => $data['title'],
            'image' => $fileName,
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'user_id' => $data['user_id'] ?? null,
            'author_id' => $data['author_id'] ?? null,
        ];

        $tagsAttachments = $data['tags_id'] ?? [];

        $articleables = [];

        foreach ($data['articleable'] ?? [] as $key => $articleable) {
            if ($key === 'source') {
                $articleables[] = new SourceArticle([
                    'sourceName' => $articleable['name'],
                    'sourceLink' => $articleable['link'],
                    'category_id' => $data['category_id'],

                ]);
            } elseif ($key === 'youtubeLink') {
                $articleables[] = new YoutubeLink([
                    'youtubeLink' => $articleable,
                    'category_id' => $data['category_id'],
                ]);
            }
        }

        return [$articleData, $tagsAttachments, $articleables];

    }
}
