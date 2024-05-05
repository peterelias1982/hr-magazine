namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return view('comment.index', compact('comment'));
    }

    public function create()
    {
        return view('includes.commentSection');
    }

    public function store(Request $request)
    {
        Comment::create($request->all());
        return redirect()->route('comment.index');
    }

    public function edit(Comment $comment)
    {
        return view('includes.commentSection', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->route('comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index');
    }
}