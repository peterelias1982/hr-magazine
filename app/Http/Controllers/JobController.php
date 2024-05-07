<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Traits\Common;
use App\Models\JobDetail;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreJobsRequest;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class JobController extends Controller
{
    use Common;

    function index()
    {
        $jobs = JobDetail::where("employer_id", 1)->get();
        $jobApplied = DB::table('job_applieds')
            ->join('job_details', 'job_applieds.jobDetail_id', '=', 'job_details.id')
            ->join('job_seekers', 'job_applieds.jobSeeker_id', '=', 'job_seekers.id')
            ->where("job_details.employer_id", 4)
            ->join('users', 'job_seekers.user_id', '=', 'users.id')->get();
        return view('publicPages.jobs.jobsPosted', compact('jobs', "jobApplied"));
    }

    function create()
    {
        $jobCategory = JobCategory::get();
        $levels = ["entry level", "intermediate level", "expert level"];
        return view("publicPages.jobs.postJob", compact('jobCategory', "levels"));
    }

    function store(StoreJobsRequest $request)
    {
        try {
            $data = $request->except('_token');
            $data['image'] = $this->uploadFile($data['image'], 'assets/images/jobs');
            $data["employer_id"] = 1;
            JobDetail::create($data);
            return redirect()
                ->route('jobs.jobsPosted')
                ->with(['messages' => json_encode(['success' => ['Jobs created Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('jobs.jobsPosted')
                ->with(['messages' => json_encode(['error' => ['Error creating Job: ' . $exception->getMessage()]])]);
        }

    }

    function show($slug)
    {
        try {
            $jobDetails = JobDetail::where("slug", $slug)->first();
            if (!$jobDetails) {
                throw new ResourceNotFoundException('Job is not found');
            }
            return view('publicPages.jobs.jobDetails', compact('jobDetails'));
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => [' Job: ' . $exception->getMessage()]])]);
        }

    }

    function browseJobs()
    {
        $request = Request();
        $jobs = $this->search($request);
        $jobs = $jobs
            ->whereDate('job_details.deadline', '>=', Carbon::now()->format('Y-m-d'))
            ->select(['*', 'job_details.slug as jobSlug'])
            ->get();

        $categories = JobCategory::get();

        return view('publicPages.jobs.browseJobs', compact('jobs', 'categories'));
    }

    function search($request)
    {
        $jobs = DB::table('job_details')
            ->join('job_categories', 'job_categories.id', '=', 'job_details.category_id');

        if ($search = $request->search) {
            $jobs->where('job_details.title', "LIKE", "%$search%");
        }
        if ($search = $request->optcheckbox) {

            foreach ($search as $sr) {
                if ($sr == "All") {
                    break;
                }
                $jobs->orWhere("job_details.city", "LIKE", "%$sr%");
            }
        }
        if ($search = $request->optcheckbox2) {

            foreach ($search as $cat) {
                if ($cat == "All") {
                    break;
                }
                $jobs->orWhere("job_categories.category", "LIKE", "%$cat%");
            }
        }
        return $jobs;
    }


}

