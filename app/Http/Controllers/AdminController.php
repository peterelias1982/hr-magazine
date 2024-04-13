<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('Admin.user.admin.allAdmin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.user.admin.addAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);
        $data=$request->except(['_token']);
        $data['password']=Hash::make($request['password']);
        $user=User::create($data);
        if($user->position != 'user'){
            // dd($user->position);
            $admin= new Admin();
            $admin->user_id = $user->id;
            $admin->save();}
        // Admin::create(['user_id'=>$user->id]);}
        // dd($user->id);
        return redirect()->route('admins.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('admin.user.admin.userInfo');
    }

    public function edit(Admin $admin)
    {
        //
    }


    public function update(AdminRequest $request, $slug)
    {
        try {
            $admin = Admin::where("slug", $slug)->first();
            return redirect()
                ->route('admin.admins.show')
                ->with(['messages' => ['success' => ['Admin updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.admins.show')
                ->with(['messages' => ['error' => ['Error updating category: ' . $exception->getMessage()]]]);
        }
    }

    public function destroy(Admin $admin, $slug)
    {
        try {
            Admin::where('slug', $slug)->delete();

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['success' => ['Admin deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['error' => ['Error deleting The Admin: ' . $exception->getMessage()]]]);
        }
    }
}
