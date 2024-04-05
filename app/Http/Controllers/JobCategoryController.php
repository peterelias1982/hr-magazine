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
        ], [
            'category.required' => 'You have to enter the name of the category.',
        ]);

        try {
            JobCategory::create($data);
            return redirect()
                ->route('jobCategory.index')
                ->with('success', 'Category Added Successfully');
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Error adding category: ' . $exception->getMessage()]);
        }
    }


    public function edit(JobCategory $jobCategory , $slug)
    {
        $categories = JobCategory::where('slug', $jobCategory->slug)->get();
        return view('admin/jobCategory', compact('jobCategory', 'categories'));
    }

    public function update(Request $request, JobCategory $jobCategory , $slug)
    {
        $jobCategory = JobCategory::where("slug", $slug)->firstOrFail();
        $validated = $request->validate([
            'category' => 'required|min:3|max:50',
        ]);

        $jobCategory->update($validated);
        return redirect()
            ->back()
            ->with('success', 'Category Edited Successfully');
    }

    public function destroy(JobCategory $jobCategory, $slug): \Illuminate\Http\RedirectResponse
    {
        try {
            $jobCategory = JobCategory::where("slug", $slug)->firstOrFail();
            $jobCategory->delete();
            //ddd($slug);
            return redirect()
                ->back()
                ->with('success', 'Category is deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

}
