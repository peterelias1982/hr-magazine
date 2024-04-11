<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Common;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class JobSeekerController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobSeekers = JobSeeker::get();
        $messages = $this->getMessages();

        return view('Admin.user.seeker.allSeeker', compact('jobSeekers', 'messages'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $user = User::with('jobSeekerUser')->where('slug', $slug)->first();

            if (!$user) {
                throw new ResourceNotFoundException('User is not found');
            }

            return view('Admin.user.seeker.userInfo', compact('user'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => ['error' => ['Error user not found: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        try {
            $user = User::with('jobSeekerUser')->where('slug', $slug)->first();

            $user->update([
                'active' => isset($request->active),
            ]);

            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => ['success' => ['Job seeker data updated successfully']]]);

        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => ['error' => ['Error updating job seeker data: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            User::where('slug', $slug)->delete();
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => ['success' => ['Job seeker data deleted successfully']]]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => ['error' => ['Error deleting job seeker data: ' . $exception->getMessage()]]]);
        }
    }

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }
}
