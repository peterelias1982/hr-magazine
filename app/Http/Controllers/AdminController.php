<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        //$admins = Admin::with('userAdmin')->get();
       return view('Admin.user.admin.allAdmin' , compact('admins'));
    }

    public function create()
    {
        return view('Admin.user.admin.addAdmin');
    }

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
        return redirect()->route('admin.admins.index');
    }
    public function show($userId , $slug)
    {
        try {
            $admins = Admin::where('user_id', $userId)->first();

           // $admins=Admin::with('userAdmin')->when($slug, function ($query) use ($slug) {
             //   $query->whereHas('userAdmin', function ($query) use ($slug) {
          //          $query->where('slug', $slug );
          //      });
           // })->first();
            if (!$admins) {
                abort(404);
            }
            $admins->created_at = $admins->created_at->diffForHumans(['parts' => 1]);

            return view('admin.user.admin.userInfo', compact('admins'));

        } catch (\Throwable $exception) {
            return redirect()->route('admin.admins.index')
                ->with(['messages' => ['error' => ['Error user not found: ' . $exception->getMessage()]]]);
        }
    }



    public function update(AdminRequest $request, $slug)
    {
        try {
            $admin = Admin::where("slug", $slug)->first();
            if (!$admin) {
                abort(404);
            }
            $admin->update($request->validated());
            return redirect()
                ->route('admin.admins.show', ['slug' => $slug])
                ->with(['messages' => ['success' => ['Admin updated Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.admins.show', ['slug' => $slug])
                ->with(['messages' => ['error' => ['Error updating admin: ' . $exception->getMessage()]]]);
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
