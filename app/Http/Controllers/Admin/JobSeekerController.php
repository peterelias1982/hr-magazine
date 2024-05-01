<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class JobSeekerController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = Request();
        $jobSeekers_ids = $this->searchWith(requestData: [
            'name' => $request->name,
            'email' => $request->email,
            'active' => $request->active,
            'blocked' => $request->blocked,
        ]);

        $jobSeekers = JobSeeker::whereIn('id', $jobSeekers_ids)->get();

        return view('Admin.user.seeker.allSeeker', compact('jobSeekers'));
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
                ->with(['messages' => json_encode(['error' => ['Error user not found: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        try {
            Gate::authorize('crudUser');
            $user = User::with('jobSeekerUser')->where('slug', $slug)->first();

            $user->update([
                'active' => isset($request->active),
            ]);

            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => json_encode(['success' => ['Job seeker data updated successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => json_encode(['error' => ['Error updating job seeker data: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            Gate::authorize('crudUser');
            User::where('slug', $slug)->delete();
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => json_encode(['success' => ['Job seeker data deleted successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.jobSeekers.index')
                ->with(['messages' => json_encode(['error' => ['Error deleting job seeker data: ' . $exception->getMessage()]])]);
        }
    }

    private function searchWith(array $requestData)
    {
        $query = DB::table('users')
            ->join('job_seekers', 'job_seekers.user_id', '=', 'users.id')
            ->select('users.*', 'job_seekers.id', 'job_seekers.user_id');

        if ($requestData['name']) {
            $query
                ->where(DB::raw("CONCAT(users.firstName, ' ', users.secondName)"), 'LIKE', "%{$requestData['name']}%")
                ->select('job_seekers.id');
        }
        if ($requestData['email']) {
            $query
                ->where('users.email', 'LIKE', "%{$requestData['email']}%")
                ->select('job_seekers.id');
        }
        if (isset($requestData['active']) && isset($requestData['blocked'])) {
        } elseif (isset($requestData['active'])) {
            $query->where('users.active', true);
        } elseif (isset($requestData['blocked'])) {
            $query->where('users.active', false);
        }

        $query->select('job_seekers.id');

        return $query->get()->pluck('id');
    }

}
