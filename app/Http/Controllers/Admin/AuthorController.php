<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use App\Models\SocialMedia;
use App\Models\User;
use App\Traits\Common;
use App\Traits\Files;
use App\Traits\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class AuthorController extends Controller
{
    use Common;
    use ResetPassword;
    use Files;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = Request();

        $authors_ids = $this->searchWith(requestData: [
            'name' => $request['name'],
            'email' => $request['email'],
            'status' => $request['status'],
        ]);

        $authors = User::whereIn('id', $authors_ids)->get();

        return view('Admin.user.auther.allAuthor', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $social = SocialMedia::get();
        return view('Admin.user.auther.addAuthor', compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        try {
            Gate::authorize('crudUser');
            $data = $this->prepareData($request->all());

            $user = User::create($data['user']);

            Author::create([
                ...$data['author'],
                'user_id' => $user->id,
            ]);

            $user->socialMedia()->sync($data['media']);

            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['success' => ['Author created Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['error' => ['Error creating author: ' . $exception->getMessage()]])]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $user = User::where('slug', $slug)->first();
            $socialMedia = SocialMedia::get();

            if (!$user) {
                throw new ResourceNotFoundException('User is not found');
            }
            return view('Admin.user.auther.userinfo', compact('user', 'socialMedia'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['error' => ['Error showing author: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, string $slug)
    {
        try {
            Gate::authorize('crudUser');
            $data = $this->prepareData($request->all());

            $user = User::where('slug', $slug)->first();
            $user->update($data['user']);

            Author::where('user_id', $user->id)->first()->update($data['author']);

            $user->socialMedia()->sync($data['media']);

            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['success' => ['Author updated Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['error' => ['Error updating author: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            Gate::authorize('crudUser');
            $user = User::where('slug', $slug)->first();
//            delete the image file
            if(!str_starts_with($user->image , 'default')) {
                $this->deleteFile(public_path('assets/images/users/'. $user->image));
            }
//           delete rest of data
            $user->delete();

            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['success' => ['Author deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.authors.index')
                ->with(['messages' => json_encode(['error' => ['Error deleting The Author: ' . $exception->getMessage()]])]);
        }
    }

    private function searchWith(array $requestData): \Illuminate\Support\Collection
    {
        $query = DB::table('users')
            ->join('authors', 'users.id', '=', 'authors.user_id');

        if ($requestData['name']) {
            $query->where('users.firstName', 'LIKE', "%{$requestData['name']}%");
        }

        if ($requestData['email']) {
            $query->where('users.email', 'LIKE', "%{$requestData['email']}%");
        }

        if ($requestData['status']) {
            $query->where('users.active', '=', $requestData['status'] == 'active');
        }

        return $query->select('users.id')->get()->pluck('id');
    }

    private function prepareData(array $data): array
    {
        $preparedData = [];

        $preparedData['user'] = [
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'gender' => $data['gender'],
            'mobile' => $data['mobile'],
            'position' => $data['position'],
            'active' => isset($data['active']),
            'email' => $data['email'],
        ];

        if ($data['image'] ?? false) {
            $image = $this->uploadFile($data['image'], 'assets/images/users');
            if (($data['oldImage'] ?? false) && !str_starts_with($data['oldImage'], 'default' . DIRECTORY_SEPARATOR)) {
                $this->deleteFile(public_path('assets/images/users/' . $data['oldImage']));
            }
        } elseif ($data['oldImage'] ?? false) {
            $image = $data['oldImage'];
        } else {
            $allImages = AuthorController::getFilesFromDir(public_path('assets/images/users/default'));
            $image = fake()->randomElement($allImages);

            $imageArray = explode('-', $image);
            $imageArray[0] = $data['gender'];
            $image = implode('-', $imageArray);

            $image = 'default' . DIRECTORY_SEPARATOR . $image;
        }

        $preparedData['user']['image'] = $image;;
        $preparedData['author'] = [
            'approved' => isset($data['approved']),
            'bio' => isset($data['bio']),
            'description' => $data['shortDescription'],
        ];

        $preparedData['media'] = [];

        foreach ($data['socialMedia'] as $id => $media) {
            if ($media) {
                $preparedData['media'][$id] = ['value' => $media];
            }
        }

        return $preparedData;
    }

}
