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
            'tagName' => 'required|string|max:255|unique:Tag',
            'slug'=>'required|string|max:255|unique:Tag,slug',
        ], [
            'tagName.required' => 'You have to enter the name of the tagName.',
            'slug.required' => 'You have to enter the name of the slug.',
            'slug.unique' => 'The slug already exists. Please choose a different one.',
        ]);

        try {
            Tag::create($data);
            return redirect()
                ->route('Admin.article.allTag')
                ->with('success', 'Tag Added Successfully');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error adding tag: ' . $exception->getMessage()]);
        }
    }


    public function show(Tag $tags)
    {
        $tags = Tag::where('slug', $tags->slug)->get();
        return view('Admin.article.allTag', compact('tags' ));
    }

    public function edit(Tag $tags)
    {
        $tags = Tag::where('slug', $tags->slug)->get();
        return view('Admin.article.allTag', compact('tags' ));
    }
    public function update(Request $request, Tag $tags)
    {
        $validated = $request->validate([
            'tagName' => 'required|min:3|max:50',
            'slug'=>'required|string|max:255|unique:Tag,slug,'.$tags->id,
        ]);

        $tags->update($validated);
        return redirect()
            ->route('admin.article.allTag', $tags->id)
            ->with('message', 'Edited successfully!');
    }

    public function destroy(Tag $tags)
    {
     //   $tags = Tag::where('slug', $tags->slug)->get();
        $tags->delete();
        return redirect('admin/tags')
            ->with('success', 'Category is deleted successfully.');
    }
}
