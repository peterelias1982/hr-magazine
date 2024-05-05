<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\ArticleComment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CommentsController extends Controller
{
    public function showArticleComments($articleId): Collection
    {
        $baseQuery = DB::table('article_comments')
            ->join('users', 'users.id', '=', 'article_comments.user_id')
            ->where('article_comments.article_id', '=', $articleId)
            ->orderBy('article_comments.created_at', 'desc')
            ->select('*', 'article_comments.id as commentId', 'users.id as userId');

        if(Gate::denies('isAdmin')) {
            $baseQuery->where('is_deleted', '=', 0);
        }

        $comments =
            (clone $baseQuery)
                ->where('article_comments.parentComment', '=', null)
                ->get();

        foreach ($comments as $comment) {
            $replies = (clone $baseQuery)
                ->where('article_comments.parentComment', '=', $comment->commentId)
                ->get();
            $comment->replies = $replies->toArray();
        }

        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        try {
            $data = $this->prepareData($request);

            ArticleComment::create($data);

            return redirect()
                ->back()
                ->with(['messages' => json_encode(['success' => ['Comment added successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Error: ' . $exception->getMessage()]])]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        try {
            $data = $this->prepareData($request);

            $comment = ArticleComment::find($id);

            if (Gate::denies('isOwner', ['userId' => $comment->user_id])) {
                return redirect()
                    ->back()
                    ->with(['messages' => json_encode(['error' => ['Unauthorized action']])]);
            }

            $comment->update($data);
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['success' => ['Updated Successfully']])]);

        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Error: ' . $exception->getMessage()]])]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = DB::table('article_comments')
            ->where('id', '=', $id)
            ->limit(1);

        if (Gate::allows('isAdmin')) {
            $comment->delete();
        } elseif (Gate::denies('isOwner', ['userId' => $comment->first()->user_id])) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Unauthorized action']])]);
        } else {
            $comment->update(['is_deleted' => 1]);
        }

        return redirect()
            ->back()
            ->with(['messages' => json_encode(['success' => ['Deleted successfully']])]);
    }

    private function prepareData(CommentRequest $request)
    {
        return [
            'article_id' => $request['article_id'],
            'category_id' => $request['category_id'],
            'content' => $request['content'],
            'parentComment' => $request['parentComment'] ?? null,
            'user_id' => Auth::user()->id,
        ];
    }
}
