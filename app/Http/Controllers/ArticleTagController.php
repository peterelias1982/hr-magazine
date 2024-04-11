<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagArticleRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Throwable;

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

        // get messages
        $messages = $this->getMessages();

        return view('Admin.article.allTag', compact(['tags', 'messages']));
    }
    public function create()
    {
        // get messages
        $messages = $this->getMessages();

        return view('Admin.article.addTag', compact('messages'));
    }

    public function store(TagArticleRequest $request)
    {
        try {
            Tag::create([
                'tagName' => $request['tagName'],
            ]);
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => ['success' => ['Tag created Successfully']]]);

        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => ['error' => ['Error adding tag: ' . $exception->getMessage()]]]);
        }
    }

    public function update(TagArticleRequest $request,  $slug)
    {
        try {
            Tag::where('slug', $slug)->first()->update([
                'tagName' => $request['tagName'],
            ]);

            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => ['success' => ['Tag updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => ['error' => ['Error updating tag: ' . $exception->getMessage()]]]);
        }

    }

    public function destroy($slug)
    {
        try {
            Tag::where('slug', $slug)->delete();

            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => ['success' => ['Tag deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.tags.index')
                ->with(['messages' => ['error' => ['Error deleting tag: ' . $exception->getMessage()]]]);
        }

    }

    private function getMessages(): string {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }
}
