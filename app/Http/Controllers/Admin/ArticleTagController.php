<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagArticleRequest;
use App\Models\Tag;

class ArticleTagController extends Controller
{
    public function index()
    {
        // get tags data
        $query = Tag::Query();
        if ($search = Request()->tagName) {
            $query->where('tagName', 'LIKE', "%$search%");
        }
        $tags = $query->get();

        return view('Admin.article.allTag', compact('tags'));
    }

    public function create()
    {
        return view('Admin.article.addTag');
    }

    public function store(TagArticleRequest $request)
    {
        try {
            Tag::create([
                'tagName' => $request['tagName'],
            ]);
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => json_encode(['success' => ['Tag created Successfully']])]);

        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => json_encode(['error' => ['Error adding tag: ' . $exception->getMessage()]])]);
        }
    }

    public function update(TagArticleRequest $request, $slug)
    {
        try {
            Tag::where('slug', $slug)->first()->update([
                'tagName' => $request['tagName'],
            ]);

            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => json_encode(['success' => ['Tag updated Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => json_encode(['error' => ['Error updating tag: ' . $exception->getMessage()]])]);
        }

    }

    public function destroy($slug)
    {
        try {
            Tag::where('slug', $slug)->delete();

            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => json_encode(['success' => ['Tag deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => json_encode(['error' => ['Error deleting tag: ' . $exception->getMessage()]])]);
        }

    }

}
