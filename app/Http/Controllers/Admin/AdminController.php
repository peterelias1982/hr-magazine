<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\User;
use App\Traits\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

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
                ->route('admin.admins.index')
                ->with(['messages' => ['error' => ['Error creating category: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $user = User::where("slug", $slug)->first();

            if (!$user) {
                throw new ResourceNotFoundException('User is not found');
            }

            $user->created_at = Carbon::parse($user->created_at)->diffForHumans(['parts' => 1]);

            return view('Admin.user.admin.userinfo', compact('user'));

        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['error' => ['Error showing admin: ' . $exception->getMessage()]]]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $slug)
    {
        try {
            $data = $this->prepareData($request->all());

            $user = User::where('slug', $slug)->first();
            $user->update($data);

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['success' => ['Admin updated Successfully']]]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['error' => ['Error updating admin: ' . $exception->getMessage()]]]);
        }
    }

    public function destroy(string $slug)
    {
        try {
            $user = User::where('slug', $slug)->first();
//            delete the image file
            if(!str_starts_with($user->image , 'default')) {
                $this->deleteFile(public_path('assets/images/users/'. $user->image));
            }
//           delete rest of data
            $user->delete();

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['success' => ['Admin deleted Successfully']]]);
        } catch (Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => ['error' => ['Error deleting The Admin: ' . $exception->getMessage()]]]);
        }
    }

    private function prepareData(array $data)
    {
        $userData = [
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'position' => $data['position'],
            'active' => isset($data['active']),
        ];

        if ($data['password'] ?? false) {
            $userData['password'] = Hash::make($data['password']);
            $userData['email_verified_at'] = Carbon::now();
            $userData['active'] = 1;
        }

        if ($data['image'] ?? false) {
            $image = $this->uploadFile($data['image'], 'assets/images/users');
            if (($data['oldImage'] ?? false) && !str_starts_with($data['oldImage'] , 'default'.DIRECTORY_SEPARATOR)) {
                $this->deleteFile(public_path('assets/images/users/'. $data['oldImage']));
            }
        } elseif ($data['oldImage'] ?? false) {
            $image = $data['oldImage'];
        } else {
            $image = 'default' . DIRECTORY_SEPARATOR . fake()->randomElement(['bear.png', 'chicken.png', 'dog.png', 'panda.png', 'rabbit.png']);
        }

        $userData['image'] = $image;

        return $userData;
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
            $query->where('users.email', 'LIKE', "%{$email}%");
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



