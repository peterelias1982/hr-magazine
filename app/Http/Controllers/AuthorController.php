<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author , $slug)
    {
        try {
            $author = Admin::where("slug", $slug)->first();
            if (!$author) {
                abort(404);
            }
            $author->update($request->validated());
            return redirect()
                ->route('admin.auther.show', ['slug' => $slug])
                ->with(['messages' =>
                    ['success' =>
                    ['Admin updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.auther.show', ['slug' => $slug])
                ->with(['messages' =>
                    ['error' => ['Error updating admin: '
                    . $exception->getMessage()]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
