<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\JobDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JobSeekerPuplicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $job, string $jobseeker )
    {
        try{
        $user=DB::table('job_seekers')
        ->join('users', 'users.id', '=', 'job_seekers.user_id')
        ->leftJoin('user_media','user_media.user_id', '=', 'job_seekers.user_id')
        ->where('users.slug', $jobseeker)
        ->where('user_media.social_id', 1)
        ->first();
        $jobs=JobDetail::where('slug',$job)->first();
        
        //return dd($size);
         return view('publicPages\users\users\profileJobSeeker',compact('user','jobs'));} 
         catch (\Throwable $exception) {
            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['error' => ['Error showing job seeker: ' . $exception->getMessage()]])]);
        }
    }
    /* download file*/ 
  
   
     
    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        
    }

   
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $user=DB::table('job_seekers')
        ->join('users', 'users.id', '=', 'job_seekers.user_id')
        ->leftjoin('user_media','user_media.user_id', '=', 'job_seekers.user_id')
        ->where('users.slug', $slug)
        ->where('user_media.social_id', 1)
        ->first();
        return view('publicPages\users\users\editUserProfile',compact('$user'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
