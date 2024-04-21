<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\JobDetail;
use Illuminate\Http\Request;

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
        $jobs=JobDetail::with(['Employer'=> function ($query) {$query->select('id', 'user_id');},
            'jobCategory' => function ($query) {$query->select('id', 'category');},
            'jobSeeker' => function ($query) { $query->select('user_id');},])->get();
        $categories=JobCategory::get(['id','category']);
        
       
      return view('Admin.jobs.alljobs',compact(['jobs','categories']));
    
      //return dd( $emps);
       // return $jobs->toJson() ;
    }
    public function search(Request $request){
        if($request){
 
     $jobs = JobDetail::with(['Employer'=> function ($query) {$query->select('id', 'user_id');},
     'jobCategory' => function ($query) {$query->select('id', 'category');},
     'jobSeeker' => function ($query) { $query->select('user_id');},])
                     ->when($request, function ($query) use ($request) {
                         $query->whereHas('jobCategory', function ($query) use ($request) {
                             $query->where('id', 'like', '%' . $request->category . '%');
                         })->orWhere('title', 'like', '%' . $request->title . '%');
                     })
                   
                     ->get();
                    
                    } $categories=JobCategory::get(['id','category']);
        
        
                    return view('Admin.jobs.alljobs',compact(['jobs','categories']));
                }

    /*
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $jobdetail = JobDetail::where('slug', $slug)
                ->with(['jobCategory', 'Employer', 'jobSeeker'])->first();

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
}
