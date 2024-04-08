<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('Admin.user.employer.allEmployer',compact('employer'));
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
    public function show(Employer $employer)
    {
        //
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
    public function destroy(Employer $employer)
    {
        //
    }
}
