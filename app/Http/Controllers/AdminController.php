<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $admins = User::whereHas('adminUser')->get();
        $admins = Admin::whereHas('userAdmin')->get();

        $slug=$request->get('slug');
        $email=$request->get('email');
        $active = $request->has('status') && $request->get('status') === 'active';
        $blocked = $request->has('status') && $request->get('status') === 'blocked';
       // Filter by slug (if provided)
    if (!empty($slug)) {
        $admins = $admins->whereHas('userAdmin', function ($query) use ($slug) {
            $query->where('slug', 'like', "%{$slug}%");
        });
    }

    // Filter by email (if provided)
    if (!empty($email)) {
        $admins = $admins->whereHas('userAdmin', function ($query) use ($email) {
            $query->where('email', 'like', "%{$email}%");
        });
    }


             // active Filter (if checkbox selected)
    if ($active) {
        $admins->where('active', 1); // Assuming active is stored as a boolean (1/0)
    }

    // Declined Filter (if checkbox selected)
    if ($blocked) {
        $admins->where('active', 0); // Assuming declined is stored as a boolean (0)
    }

        
        
   
        
        

       
        
        
    //     $admins = Admin::query();
    //     if ($request->has("search")) {
    //      $keyword =  $request->get("search");
    //      $admins=Admin::with('userAdmin')
    //      ->where("slug", "LIKE", "%$keyword%")
    //      ->orWhere("email", "LIKE", "%$keyword%")
    //      ->orWhereHas("userAdmin",function($q) use ($keyword){
    //          $q->where("slug","LIKE","%$keyword%")
    //          ->orWhere("email","LIKE","%$keyword%");
    //      });
         
         
    //  } else {
    //      $admins = $admins->orderByDesc("id");
    //  }
                    //   ->select(['admins.id'])
                    //   ->whereHas('userAdmin',function($q) use ($admin){
                    //       $q->where('slug','LIKE' , "%{$admin}%") ;
                    //     })->first()->id ?? null;       
                    //     if ($author !== null) {
                    //         $articles = $articles->where('author_id', $author);
                    //     } else {
                    //         // Handle missing author (e.g., display a message or redirect)
                    //         // You can access $author here to show a user-friendly message
                    //         return redirect()->back()->with('alert', "Author not found.");
                    //     }
                    // }           

        
        // $users= User::all();
        // return view('Admin.user.admin.allAdmin', compact(['users','admins']));

        // $admins = Admin::with(['userAdmin'])->get();
        // dd($admins);



    //     $admins = Admin::all();
    //     if ($request->has("search")) {
    //         $keyword =  $request->get("search");
    //         $admins = Admin::where('name', 'like', "%{$keyword}%")->orWhere('email', 'like', " %{$keyword} ")->paginate(
    //         $admins = Admin::where("name", "LIKE", "%{$keyword}%")->orWhere("email","LIKE","%{$keyword}%")->paginate(
    //         $admins = Admin::where("name", "LIKE", "%{$keyword}%")->orWhere("email","LIKE","%{$keyword}%")->paginate(
    //             $admins = Admin::where('name', 'LIKE', "%{$keyword}%")
    //                          ->orWhereHas('userAdmin',function($q) use ($keyword){
    //                              $q->where('email', 'LIKE',"%{$keyword}%");
    //                           })->paginate(10)->appends($request->only('search'));
    //     } else {
    //        $admins =   Admin::paginate(10);
    //    }

    
     
       
    




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
}
