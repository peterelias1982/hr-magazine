<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryJobRequest;
use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    public function index()
    {
        $query = JobCategory::Query();
        if ($search = Request()->catergory) {
            $query->where("category", "LIKE", "%$search%");
        }
        $categories = $query->get();

        return view("Admin.jobs.allCategory", compact('categories'));
    }

    public function create()
    {
        return view('admin.jobs.addCategory');
    }

    public function store(CategoryJobRequest $request)
    {
        try {
            JobCategory::create([
                'category' => $request['category'],
            ]);

            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => json_encode(['success' => ['Category created Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => json_encode(['error' => ['Error creating category: ' . $exception->getMessage()]])]);
        }
    }

    public function update(CategoryJobRequest $request, $slug)
    {
        try {
            $categoryJob = JobCategory::where("slug", $slug)->first();
            $categoryJob->update([
                'category' => $request['category'],
            ]);

            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => json_encode(['success' => ['Category updated Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => json_encode(['error' => ['Error updating category: ' . $exception->getMessage()]])]);
        }
    }

    public function destroy(JobCategory $jobCategory, $slug): \Illuminate\Http\RedirectResponse
    {
        try {
            JobCategory::where('slug', $slug)->delete();

            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => json_encode(['success' => ['Category deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => json_encode(['error' => ['Error deleting category: ' . $exception->getMessage()]])]);
        }
    }

}
