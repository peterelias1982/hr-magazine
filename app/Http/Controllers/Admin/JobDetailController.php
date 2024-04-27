<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Throwable;

class JobDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = Request();
        $jobs_ids = $this->searchWith(requestData: [
            'title' => $request->title,
            'category_id' => $request->category
        ]);

        $jobs = JobDetail::with(['Employer' => function ($query) {
            $query->select('id', 'user_id');
        },
            'jobCategory' => function ($query) {
                $query->select('id', 'category');
            },
            'jobSeekers' => function ($query) {
                $query->select('user_id');
            },])->whereIn('id', $jobs_ids)->get();

        $categories = JobCategory::get(['id', 'category']);

        $messages = $this->getMessages();

        return view('Admin.jobs.alljobs', compact(['jobs', 'categories', 'messages']));
    }

    /*
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $jobdetail = JobDetail::where('slug', $slug)
                ->with(['jobCategory', 'Employer', 'jobSeekers'])->first();

            if (!$jobdetail) {
                throw new ResourceNotFoundException('Job is not found');
            }

            return view('Admin.jobs.jobDetails', compact('jobdetail'));

        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.jobs.index')
                ->with(['messages' => ['error' => ['Error not found job: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            JobDetail::where('slug', $slug)->delete();
            return redirect()
                ->route('admin.jobs.index')
                ->with(['messages' => ['success' => ['the job is deleted successfully!']]]);

        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.jobs.index')
                ->with(['messages' => ['error' => ['Error not deleting job: ' . $exception->getMessage()]]]);
        }
    }

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }

    private function searchWith(array $requestData): \Illuminate\Support\Collection
    {
        $query = DB::table('job_details');

        if ($requestData['title']) {
            $query->where('title', 'LIKE', "%{$requestData['title']}%");
        }

        if ($requestData['category_id']) {
            $query->where('category_id', '=', $requestData['category_id']);
        }

        $query->select('job_details.id');

        return $query->get()->pluck('id');
    }

}
