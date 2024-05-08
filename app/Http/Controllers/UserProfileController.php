<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfile;
use App\Models\JobSeeker;
use App\Models\User;
use App\Traits\Common;
use App\Traits\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    use Common;
    use Files;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $user_id = Auth()->user()->id;
        $user = DB::table('users')
            ->leftJoin('job_seekers', 'users.id', '=', 'job_seekers.user_id')
            ->where('users.id', $user_id)
            ->first();
            $media = DB::table('users')
            ->leftJoin('user_media', 'users.id', '=', 'user_media.user_id')
            ->where('users.id', $user_id)
            ->where('social_id',1)
            ->first();
       // return dd($user);
        return view('publicPages\users\users\userProfile', compact('user','media'));
          }  catch (\Throwable $exception) {
            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['error' => ['Error showing job seeker: ' . $exception->getMessage()]])]);
        }
    
    }
    /* download file*/
    public function download(string $file)
    {

        $filePath = public_path('assets/cvs/' . $file);
        if (file_exists($filePath)) {
            // Return the file for download
            return response()->download($filePath, $file);
        } else {
            // File not found
            return redirect()->back()->with(['messages' => json_encode(['error' => ['Error cv not found' ]])]);;
        }
    }
    /* upload file*/
    public function upload(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        $userauth = auth()->user();
        $user = DB::table('job_seekers')
            ->join('users', 'users.id', '=', 'job_seekers.user_id')
            ->where('users.slug', $userauth->slug)->first();
        $file = $request->cv;
        $pdf_file = $this->uploadFile($file, 'assets/cvs/');

        if ($user?->cv) {
            // If so, delete the existing file
            $this->deleteFile(public_path('assets/cvs/' . $user->cv));
            JobSeeker::where('user_id', $userauth->id)->update(['cv' => $pdf_file]);
        } else {
            JobSeeker::create([
                'cv' => $pdf_file,
                'user_id' => $userauth->id,
            ]);
        }

        // Update the user's record with the new file path
        return back()->with(['messages' => json_encode(['success' => ['cv uploaded Successfully']])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $user = User::where('slug', $slug)
            ->first();

        return view('publicPages\users\users\editUserProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfile $request, string $slug)
    {
        try {
        $data = $this->prepareData($request->all());
        $user = User::where('slug', $slug)->first();
        $user->update($data);
        return redirect()->route('profile.index')->with(['messages' => json_encode(['success' => ['your profile data updated Successfully']])]);
    }catch (\Throwable $exception) {
        return redirect()
            ->back()->with(['messages' => json_encode(['error' => ['Error updating your profile: ' . $exception->getMessage()]])]);
    }
}
    private function prepareData(array $data)
    {
        $userData = [
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'position' => $data['position'],
            
        ];

        if ($data['image'] ?? false) {
            $image = $this->uploadFile($data['image'], 'assets/images/users');
            if (($data['oldImage'] ?? false) && !str_starts_with($data['oldImage'], 'default' . DIRECTORY_SEPARATOR)) {
                $this->deleteFile(public_path('assets/images/users/' . $data['oldImage']));
            }
        } elseif ($data['oldImage'] ?? false) {
            $image = $data['oldImage'];
        } else {
            $allImages = UserProfileController::getFilesFromDir(public_path('assets/images/users/default'));
            $image = fake()->randomElement($allImages);

            $imageArray = explode('-', $image);
            $imageArray[0] = $data['gender'];
            $image = implode('', $imageArray);

            $image = 'default' . DIRECTORY_SEPARATOR . $image;
        }

        $userData['image'] = $image;

        return $userData;
    }

}
