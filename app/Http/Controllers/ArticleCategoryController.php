<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryArticleRequest;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Session;
use Throwable;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = ArticleCategory::Query();
        if ($search = Request()->catergory) {
            $query->where("articleCategoryName", "LIKE", "%$search%");
        }
        $categories = $query->get();

        $messages = $this->getMessages();

        return view("Admin.article.allCategory", compact('categories', 'messages'));
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
        try {
            $data = $this->prepareData($request);
            ArticleCategory::create($data);

            return redirect()
                ->route('articleCategories.index')
                ->with(['messages' => ['success' => ['Category created Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('articleCategories.index')
                ->with(['messages' => ['error' => ['Error creating category: ' . $exception->getMessage()]]]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryArticleRequest $request, $slug)
    {
        try {
            $categoryArticle = ArticleCategory::where("slug", $slug)->first();
            $data = $this->prepareData($request);
            $categoryArticle->update($data);

            return redirect()
                ->route('articleCategories.index')
                ->with(['messages' => ['success' => ['Category updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('articleCategories.index')
                ->with(['messages' => ['error' => ['Error updating category: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            ArticleCategory::where('slug', $slug)->delete();

            return redirect()
                ->route('articleCategories.index')
                ->with(['messages' => ['success' => ['Category deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('articleCategories.index')
                ->with(['messages' => ['error' => ['Error deleting category: ' . $exception->getMessage()]]]);
        }
    }

    private function prepareData($request): array
    {
        return [
            "articleCategoryName" => $request["articleCategoryName"],
            "hasComments" => isset($request['hasComments']),
            "hasSource" => isset($request['hasSource']),
            "hasYoutubeLink" => isset($request['hasYoutubeLink']),
            "hasAuthor" => isset($request['hasAuthor']),
        ];
    }

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }
}
