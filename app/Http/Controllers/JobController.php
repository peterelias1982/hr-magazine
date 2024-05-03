<?php

namespace App\Http\Controllers;

use App\Traits\Common;
use App\Models\JobDetail;
use App\Models\JobCategory;
use App\Http\Requests\StoreJobsRequest;

class JobController extends Controller
{
    use Common;
    function index (){
        return view('publicPages.jobs.jobsPosted');
    }
    function create() {
        $jobCategory=JobCategory::get();
        $levels=["entry level", "intermediate level", "expert level"];
        // @dd($jobCategory);
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

