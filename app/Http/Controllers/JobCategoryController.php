<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryJobRequest;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Throwable;

class JobCategoryController extends Controller
{
    public function index()
    {
        $query = JobCategory::Query();
        if ($search = Request()->catergory) {
            $query->where("category", "LIKE", "%$search%");
        }
        $categories = $query->get();

        $messages = $this->getMessages();

        return view("Admin.jobs.allCategory", compact('categories', 'messages'));
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
                ->with(['messages' => ['success' => ['Category created Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => ['error' => ['Error creating category: ' . $exception->getMessage()]]]);
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
                ->with(['messages' => ['success' => ['Category updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => ['error' => ['Error updating category: ' . $exception->getMessage()]]]);
        }
    }

    public function destroy(JobCategory $jobCategory, $slug): \Illuminate\Http\RedirectResponse
    {
        try {
            JobCategory::where('slug', $slug)->delete();

            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => ['success' => ['Category deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.jobCategories.index')
                ->with(['messages' => ['error' => ['Error deleting category: ' . $exception->getMessage()]]]);
        }
    }

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }

}
