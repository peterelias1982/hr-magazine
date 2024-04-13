<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('employers')->join('users', 'users.id', '=', 'employers.user_id');
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
        return view('Admin.user.employer.allEmployer', compact('employer', 'messages'));
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
    public function show($slug)
    {
        $employer = DB::table('employers')->join('users', 'users.id', '=', 'employers.user_id')->where("slug", $slug)->first();
        $employer->created_at = Carbon::parse($employer->created_at)->diffForHumans(['parts' => 1]);
        return view("Admin.user.employer.userInfo", compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            $user = User::where('slug',$slug)->first();
            $employer=Employer::where('user_id',$user->id)->first();
            unlink("assets/images/employer/".$employer->logo);
            $user->delete();
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['success' => ['Employer deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.employers.index')
                ->with(['messages' => ['error' => ['Error delete employer: ' . $exception->getMessage()]]]);
        }
    }
    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }
}
