<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobCategoryController extends Controller
{
    public function index()
    {
        $categories = JobCategory::all();
        return view('admin.jobs.allCategory', compact('categories'));
    }

    public function create()
    {
        return view('admin.jobs.addCategory');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|string|max:255',
            'slug'=>'required|string|max:255|unique:job_categories,slug',
        ], [
            'category.required' => 'You have to enter the name of the category.',
            'slug.required' => 'You have to enter the name of the slug.',
            'slug.unique' => 'The slug already exists. Please choose a different one.',
        ]);

        try {
            JobCategory::create($data);
            return redirect()
                ->route('categories.index')
                ->with('success', 'Category Added Successfully');
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error adding category: ' . $exception->getMessage()]);
        }
    }

    public function show(JobCategory $jobCategory)
    {
        $categories = JobCategory::where('slug', $jobCategory->slug)->get();
        return view('admin.jobs.allCategory', compact('jobCategory', 'categories'));
    }

    public function edit(JobCategory $jobCategory)
    {
        $categories = JobCategory::where('slug', $jobCategory->slug)->get();
        return view('admin.jobs.allCategory', compact('jobCategory', 'categories'));
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $validated = $request->validate([
            'category' => 'required|min:3|max:50',
            'slug'=>'required|string|max:255|unique:job_categories,slug,'.$jobCategory->id,
        ]);

        $jobCategory->update($validated);
        return redirect()
            ->route('admin.jobs.allCategory', $jobCategory->id)
            ->with('message', 'Edited successfully!');
    }

    public function destroy(JobCategory $jobCategory)
    {
        $categories = JobCategory::where('slug', $jobCategory->slug)->get();
        $categories->delete();
        return redirect('admin/job/categories')
            ->with('success', 'Category is deleted successfully.');
    }
}
