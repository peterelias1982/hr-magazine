<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;
use Throwable;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class JobCategoryController extends Controller
{

    public function index()
    {
        try {
            $categories = JobCategory::all();
            return view('admin.jobs.allCategory', compact('categories'));
        } catch (Throwable $exception) {
            return redirect()->back()
                ->withErrors(['error' => 'Error adding category'. $exception->getMessage()]);
}
    }

    public function create()
    {
        return view('Admin.jobs.addCategory');
    }

    public function store(Request $request, $validator)
    {
        $data = $request->validate([
            'category' => 'required|string|max:255',
            'slug'=>'required|string|max:255|unique:job_categories,slug',
        ], [
            'category.required' => 'You have to enter the name of the category.',
            'slug.required' => 'You have to enter the name of the slug.',
            'slug.unique' => 'The slug already exists. Please choose a different one.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            JobCategory::create($data);
            return view('admin.jobs.allCategory')
                ->with('success', 'Category Added Successfully');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error adding category'. $exception->getMessage()]);
        }
    }

    public function show(JobCategory $jobCategory)
    {

        $categories = JobCategory::findBySlug( string('slug') );

        return view('jobCategories.show', compact('jobCategory', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        //
    }
}
