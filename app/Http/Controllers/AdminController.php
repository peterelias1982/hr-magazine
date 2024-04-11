<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $slug = $request->get('slug');
        $email = $request->get('email');
        $active = $request->has('status') && $request->get('status') === 'active';
        $blocked = $request->has('status') && $request->get('status') === 'blocked';

        $query = Admin::query()
            ->with('userAdmin')
            ->leftJoin('users', 'users.id', '=', 'admins.user_id');

        if ($slug) {
            $query->where('users.slug', $slug);
        }

        if ($email) {
            $query->where('users.email', $email);
        }

        if ($active) {
            $query->where('users.active', 1);
        }

        if ($blocked) {
            $query->where('users.active', 0);
        }

        $query->where('users.position', 'admin'); // Filter for admin position
        $admins = $query->select('admins.*')->paginate(25)->appends(['slug' => $slug, 'email' => $email]);


        return view('Admin.user.admin.allAdmin', compact('admins'));
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
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        if ($user->position != 'user') {
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->save();
        }
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }


    // private function searchWith(array $requestData){

    //     $query = DB::table('admins')
    //     ->join('users', 'users.id', '=', 'admins.user_id')
    //     ->select('admins.*', 'users.firstName', 'users.secondName', 'users.email', 'users.position' , 'users.active')
    //     ->get()
    //     ;

    //     // if($requestData['']){

    //     }



    }


