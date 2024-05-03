<?php

namespace App\Http\Controllers;

use App\Traits\Common;
use App\Models\JobDetail;
use App\Models\JobApplied;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreJobsRequest;

class JobController extends Controller
{
    use Common;
    function index (){
        $jobs=JobDetail::where("employer_id",1)->get();
    $jobApplied = DB::table('job_applieds')
    ->join('job_details', 'job_applieds.jobDetail_id', '=', 'job_details.id')
    ->join('job_seekers', 'job_applieds.jobSeeker_id', '=', 'job_seekers.id')
    ->where("job_details.employer_id",4)
    ->join('users', 'job_seekers.user_id', '=', 'users.id')->get();
        return view('publicPages.jobs.jobsPosted',compact('jobs',"jobApplied"));
    }
    function create() {
        $jobCategory=JobCategory::get();
        $levels=["entry level", "intermediate level", "expert level"];
        return view("publicPages.jobs.postJob",compact('jobCategory',"levels"));
    }
    function store(StoreJobsRequest $request){
        try {
            $data=$request->except('_token');
            $data['image']=$this->uploadFile($data['image'],'assets/images/jobs' );
            $data["employer_id"]=1;
            JobDetail::create($data);
            return redirect()
                ->route('jobs.jobsPosted')
                ->with(['messages' => json_encode(['success' => ['Jobs created Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('jobs.jobsPosted')
                ->with(['messages' => json_encode(['error' => ['Error creating category: ' . $exception->getMessage()]])]);
        }
        
    }
        
    
}

