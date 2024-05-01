<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Traits\ResetPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class EmployerController extends Controller
{
    use ResetPassword;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('employers')
            ->join('users', 'users.id', '=', 'employers.user_id');

        $request = Request();
        if ($search = $request->name) {
            $users->where('users.firstName', "LIKE", "%$search%");
        }
        if ($search = $request->email) {
            $users->where("users.email", "LIKE", "%$search%");
        }
        if ($request->active) {
            $users->where("users.active", "=", 1);
        }
        if ($request->blocked) {
            $users->where("users.active", "=", 0);
        }

        $employer = $users->get();

        return view('Admin.user.employer.allEmployer', compact('employer'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            $employer = DB::table('employers')
                ->join('users', 'users.id', '=', 'employers.user_id')
                ->where("slug", $slug)
                ->first();

            $socialMedia = DB::table('user_media')
                ->join('social_media', 'social_media.id', '=', 'user_media.social_id')
                ->where('user_media.user_id', $employer->user_id)
                ->get();


            if (!$employer) {
                throw new ResourceNotFoundException('User is not found');
            }

            $employer->created_at = Carbon::parse($employer->created_at)->diffForHumans(['parts' => 1]);
            return view("Admin.user.employer.userInfo", compact('employer', 'socialMedia'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => json_encode(['error' => ['Error user not found: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        try {
            Gate::authorize('crudUser');
            $user = User::where('slug', $slug)->first();
            $user->update([
                'active' => isset($request->active),
            ]);
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => json_encode(['success' => ['Employer Update Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => json_encode(['error' => ['Error Update employers: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            Gate::authorize('crudUser');
            $user = User::where('slug', $slug)->first();
            $employer = Employer::where('user_id', $user->id)->first();
            // unlink("assets/images/employers/" . $employer->logo);
            $user->delete();
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => json_encode(['success' => ['Employer deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => json_encode(['error' => ['Error delete employers: ' . $exception->getMessage()]])]);
        }
    }

}
