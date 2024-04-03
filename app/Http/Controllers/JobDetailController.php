<?php

namespace App\Http\Controllers;

use App\Models\JobDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobsRequest;
use App\Http\Requests\UpdateJobsRequest;
use App\Models\Employer;
use App\Models\JobCategory;

class JobDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs=JobDetail::with(['Employer'=> function ($query) {$query->select('id', 'user_id');},
            'jobCategory' => function ($query) {$query->select('id', 'category');},
            'jobSeeker' => function ($query) { $query->select('user_id');},])->get();
        
        
      return view('Admin.jobs.alljobs',compact('jobs'));
    
      //return dd( $emps);
        return $jobs->toJson() ;
    }

   

    /*
     * Display the specified resource.
     */
    public function show(JobDetail $jobDetail, string $slug)
    {
        $jobdetail=JobDetail::where('slug', $slug)
        ->with(['jobCategory','Employer','jobSeeker'])->first();
    
        //return dd($jobdetail);
        //return $jobdetail->toJson();
        return view('Admin.jobs.jobDetails', compact('jobdetail'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobDetail $jobDetail, Request $request)
    {
        $slug=$request->slug;
        
        JobDetail::where('slug',$slug)->delete();
        return redirect('/admin/jobs/jobs/')->with('deleted', 'the job is deleted!');
        
    }
}
