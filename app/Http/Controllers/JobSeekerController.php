<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJobSeekerRequest;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Common;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobSeekers = JobSeeker::get();
        return view('Admin.user.seeker.allSeeker', compact('jobSeekers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, string $slug)
    {
        $user = User::with('jobSeekerUser')->where('slug', $slug)->first();
        return view('Admin.user.seeker.userInfo', compact('user'));
        // dd($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request, string $slug)
    {        
        $user = User::with('jobSeekerUser')->where('slug', $slug)->first();

        $user->update([
            'firstName' => $request->firstName,
            'position' => $request->position,
            'mobile' => $request->mobile,
            'active' => isset($request->active),
            'jobTitle' => $request->jobTitle,
            'user_id' => $request->user_id,
        ]);

        if ($request->hasFile('cv')) {
            $fileName = $this->uploadFile($request->cv, 'admin/jobSeekersCVs');
            $data['cv'] = $fileName;
            unlink("admin/jobSeekersCV/" . $request->oldCV);
        }
       
        return redirect()->route('admin.jobSeekers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, string $slug)
    {
        User::where('slug', $slug)->delete();
        return redirect()->route('admin.jobSeekers.index');
    }
}
