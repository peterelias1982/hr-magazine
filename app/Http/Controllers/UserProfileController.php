<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfile;
use App\Models\JobSeeker;
use App\Models\User;
use App\Traits\Common;
use App\Traits\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class UserProfileController extends Controller
{
    use Common;
    use Files;

    /**
     * Display resource.
     */
    public function show(string $slug)
    {
        try {
            $user_id = User::where('slug', $slug)->select('id')->first()['id'];

            if (!$user_id) {
                throw new ResourceNotFoundException('User is not found');
            }

            $user = DB::table('users')
                ->leftJoin('job_seekers', 'users.id', '=', 'job_seekers.user_id')
                ->where('users.id', $user_id)
                ->select('users.*', 'users.id as userId', 'job_seekers.*')
                ->first();

            $media = DB::table('users')
                ->leftJoin('user_media', 'users.id', '=', 'user_media.user_id')
                ->where('users.id', $user_id)
                ->where('social_id', 1)
                ->first();

            return view('publicPages\users\users\userProfile', compact('user', 'media'));
        } catch (\Throwable $exception) {
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
            return redirect()->back()->with(['messages' => json_encode(['error' => ['Error cv not found']])]);;
        }
    }

    /* upload file*/
    public function upload(Request $request)
    {
        try {
            $user = User::where("slug", auth()->user()->slug)->first();

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

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
        } catch (\Throwable $exception) {
            return redirect()
                ->back()->with(['messages' => json_encode(['error' => ['User: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        try {
            $user = User::where('slug', $slug)
                ->first();
            if (!$user) {
                throw new \Exception("User not found with slug: $slug");
            }

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

            return view('publicPages\users\users\editUserProfile', compact('user'));
        } catch (\Throwable $exception) {
            return redirect()
                ->back()->with(['messages' => json_encode(['error' => ['User: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfile $request, string $slug)
    {
        try {
            $user = User::where("slug", $slug)->first();

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

            if (!$user) {
                throw new \Exception("User not found with slug: $slug");
            }

            $data = $this->prepareData($request->all());
            $user = User::where('slug', $slug)->first();
            $user->update($data);
            return redirect()->route('profile.index')->with(['messages' => json_encode(['success' => ['your profile data updated Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->back()->with(['messages' => json_encode(['error' => ['Error updating your profile: ' . $exception->getMessage()]])]);
        }
    }

    public function destroy(User $user, $slug): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = User::where("slug", $slug)->first();

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

            if (!str_starts_with($user->image, 'default' . DIRECTORY_SEPARATOR)) {
                $this->deleteFile(public_path("assets/images/employers/" . $user->image));
            }

            $jobSeeker = JobSeeker::where('user_id', $user->id)->first();
            $this->deleteFile(public_path("assets/cvs/" . $jobSeeker?->cv));

            $user->delete();

            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['success' => ['Account deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['error' => ['Error deleting category: ' . $exception->getMessage()]])]);
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
            $image = implode('-', $imageArray);

            $image = 'default' . DIRECTORY_SEPARATOR . $image;
        }

        $userData['image'] = $image;

        return $userData;
    }

}
