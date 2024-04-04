<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Throwable;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('Admin.article.allTag', compact('tags'));
    }
    public function create()
    {
        return view('Admin.article.addTag');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'tagName' => 'required|string|max:255|unique:tags,tagName',
        ]);

        try {
            Tag::create($data);

            return redirect()
                ->route('tags.index')
                ->with('success', 'Tag Added Successfully');

        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error adding tag: ' . $exception->getMessage()]);
        }
    }

    public function update(Request $request,  $slug)
    {

        $tag = Tag::where('slug', $slug)->update([
            'tagName' => $request->input('tagName'),
        ]);

        return redirect()
            ->route('tags.index')
            ->with('message', 'Tag updated successfully!');
    }

    public function destroy($slug)
    {
        Tag::where('slug', $slug)->delete();

        return redirect()->route('tags.index')
            ->with('success', 'Category is deleted successfully.');
    }
}
