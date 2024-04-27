<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Throwable;

class EmployerController extends Controller
{
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

        $messages = $this->getMessages();

        return view('Admin.user.employers.allEmployer', compact('employer', 'messages'));
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
            return view("Admin.user.employers.userInfo", compact('employer', 'socialMedia'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['error' => ['Error user not found: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        try {
            $user = User::where('slug', $slug)->first();
            $user->update([
                'active' => isset($request->active),
            ]);
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['success' => ['Employer Update Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['error' => ['Error Update employers: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            $user = User::where('slug', $slug)->first();
            $employer = Employer::where('user_id', $user->id)->first();
            unlink("assets/images/employers/" . $employer->logo);
            $user->delete();
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['success' => ['Employer deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['error' => ['Error delete employers: ' . $exception->getMessage()]]]);
        }
    }

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }
}
