<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ResetPassword;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class AdminController extends Controller
{
    use Common;
    use ResetPassword;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = $this->searchWith($request);

        return view('Admin.user.admin.allAdmin', compact('admins'));

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
            Gate::authorize('crudUser');
            $data = $this->prepareData($request->all());

            $user = User::create($data);
            $admin = Admin::create([
                'user_id' => $user->id
            ]);

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => json_encode(['success' => ['Admin created Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => json_encode(['error' => ['Error creating category: ' . $exception->getMessage()]])]);
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
                ->with(['messages' => json_encode(['error' => ['Error showing admin: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $slug)
    {
        try {
            if(!(Gate::allows('crudUser') || Auth::user()->slug === $slug)) {
                throw new UnauthorizedHttpException('Forbidden');
            }

            $data = $this->prepareData($request->all());

            if(Gate::denies('crudUser')) {
                unset($data['active']);
            }

            $user = User::where('slug', $slug)->first();
            $user->update($data);

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => json_encode(['success' => ['Admin updated Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => json_encode(['error' => ['Error updating admin: ' . $exception->getMessage()]])]);
        }
    }

    public function destroy(string $slug)
    {
        try {
            Gate::authorize('crudUser');
            $user = User::where('slug', $slug)->first();
//            delete the image file
            if (!str_starts_with($user->image, 'default')) {
                $this->deleteFile(public_path('assets/images/users/' . $user->image));
            }
//           delete rest of data
            $user->delete();

            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => json_encode(['success' => ['Admin deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.admins.index')
                ->with(['messages' => json_encode(['error' => ['Error deleting The Admin: ' . $exception->getMessage()]])]);
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
            if (($data['oldImage'] ?? false) && !str_starts_with($data['oldImage'], 'default' . DIRECTORY_SEPARATOR)) {
                $this->deleteFile(public_path('assets/images/users/' . $data['oldImage']));
            }
        } elseif ($data['oldImage'] ?? false) {
            $image = $data['oldImage'];
        } else {
            $image = 'default' . DIRECTORY_SEPARATOR . fake()->randomElement(['bear.png', 'chicken.png', 'dog.png', 'panda.png', 'rabbit.png']);
        }

        $userData['image'] = $image;

        return $userData;
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



