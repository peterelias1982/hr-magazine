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
        $authors = Author::get();
        $articleCategories = ArticleCategory::select(
            ['id', 'articleCategoryName', 'hasAuthor', 'hasSource', 'hasYoutubeLink'])->get();
        $articleTags = Tag::select('id', 'tagName')->get();

        return view("Admin.article.addArticle", compact(['articleCategories', 'articleTags', 'authors']));;
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
        }

        return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->first();
        $articleCategories = ArticleCategory::get();
        $authors = Author::get();
        $articleTags = Tag::get();

        $sourceArticle = SourceArticle::where('article_id', $article->id)->first();
        $youtubeLink = YoutubeLink::where('article_id', $article->id)->first();

        return view('admin.article.articleDetails', compact('article', 'articleCategories', 'authors', 'articleTags', 'sourceArticle', 'youtubeLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $slug)
    {
        [$articleData, $tagsAttachments, $articleables] =
            $this->prepareData($request->all());

        $article_id = Article::where('slug', $slug)->update($articleData);
        $article = Article::where('id', $article_id)->first();

        $article->tags()->sync($tagsAttachments);

        foreach ($articleables as $articleable) {
            $articleable['article_id'] = $article_id;
            $articleable->save();
        }

        return redirect()->route('articles.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::where('id', $id)->delete();    // softdelete
        return redirect()->route('articles.index');
    }

    private function prepareData(array $data)
    {
        $articleData = [
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'user_id' => $data['user_id'] ?? null,
            'author_id' => $data['author_id'] ?? null,
        ];

        if($data["image"]?? false) {
            $fileName = $this->uploadFile($data["image"], 'assets/images/');
            $articleData['image'] = $fileName;
        }

        $tagsAttachments = $data['tags_id'] ?? [];

        $category = ArticleCategory::where('id', $data['category_id'])->first();

        $articleables = [];

        foreach ($data['articleable'] ?? [] as $key => $articleable) {
            if ($key === 'source' && $category->hasSourec) {
                $articleables[] = new SourceArticle([
                    'sourceName' => $articleable['name'],
                    'sourceLink' => $articleable['link'],
                    'category_id' => $data['category_id'],

                ]);
            } elseif ($key === 'youtubeLink' && $category->hasYoutubeLink) {
                $articleables[] = new YoutubeLink([
                    'youtubeLink' => $articleable,
                    'category_id' => $data['category_id'],
                ]);
            }
        }

        return [$articleData, $tagsAttachments, $articleables];

    }
}
