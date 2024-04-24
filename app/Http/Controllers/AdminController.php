<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\User;
use App\Traits\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = $this->searchWith($request);
        $messages = $this->getMessages();

        return view('Admin.user.admin.allAdmin', compact('admins', 'messages'));
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
    public function store(AdminRequest $request)
    {
        try {
            $data = $this->prepareData($request->all());

            $user = User::create($data);
            $admin = Admin::create([
                'user_id' => $user->id
            ]);

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['success' => ['Admin created Successfully']]]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.articleCategories.index')
                ->with(['messages' => ['error' => ['Error creating category: ' . $exception->getMessage()]]]);
        }
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

    private function prepareData(array $data)
    {
        if($data['image']) {
            $image = $this->uploadFile($data['image'], 'assets/images/users');
        } else {
            $image = fake()->randomElement(['bear.png', 'chicken.png', 'dog.png', 'panda.png', 'rabbit.png']);
        }

        return [
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'position' => $data['position'],
            'image' => $image,
            'active' => 1,
        ];
    }

    private function getMessages(): string
    {
        // check for messages if any
        return json_encode(Session::get('messages'));
    }

    private function searchWith($request)
    {
        $firstName = $request->get('name');
        $email = $request->get('email');
        $active = $request->has('status') && $request->get('status') === 'active';
        $blocked = $request->has('status') && $request->get('status') === 'blocked';

        $query = Admin::query()
            ->with('userAdmin')
            ->leftJoin('users', 'users.id', '=', 'admins.user_id');

        if ($firstName) {
            $query->where('users.firstName', 'LIKE', "%{$firstName}%");
        }

        if ($email) {
            $query->where('users.email', 'LIKE' ,"%{$email}%");
        }

        if ($active) {
            $query->where('users.active', 1);
        }

        if ($blocked) {
            $query->where('users.active', 0);
        }

        return $query->select('admins.*')->paginate(25)->appends(['firstName' => $firstName, 'email' => $email]);
    }


}



