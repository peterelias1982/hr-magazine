<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use App\Http\Requests\UpdateEmployerRequest;


class PublicEmployer extends Controller
{
    use Common;

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $user = User::where("slug", $slug)->first();

            $linkedin = $user ? $user->socialMedia()->where('mediaName', 'linkedin')->first() : null;
            $linkedinUrl = $linkedin ? $linkedin->pivot->value : null;

            if (!$user) {
                throw new ResourceNotFoundException('User is not found');
            }

            return view('publicPages.users.employers.employerProfile', compact('user', 'linkedin', 'linkedinUrl'));
        } catch (\Throwable $exception) {
            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['error' => ['Error showing admin: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        try {
            $user = User::where("slug", $slug)->first();

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

            $linkedin = $user ? $user->socialMedia()->where('mediaName', 'linkedin')->first() : null;
            $linkedinUrl = $linkedin ? $linkedin->pivot->value : null;
            return view('publicPages.users.employers.editEmployerProfile', compact('user', 'linkedin', 'linkedinUrl'));
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Error: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployerRequest $request, $slug)
    {
        try {
            $user = User::where("slug", $slug)->first();

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

            $data = $request->validated();

            if ($request->hasFile('image')) {
                $fileName = $this->uploadFile($request->image, 'assets/images/users');
                $data['image'] = $fileName;
                if (($data['oldImageUser'] ?? false) && !str_starts_with($data['oldImageUser'], 'default' . DIRECTORY_SEPARATOR)) {
                    $this->deleteFile(public_path('assets/images/users/' . $data['oldImageUser']));
                }
            }
            if ($request->hasFile('logo')) {
                $fileName = $this->uploadFile($request->logo, 'assets/images/employers');
                $data['logo'] = $fileName;
                if ($data['oldImageLogo'] ?? false) {
                    $this->deleteFile(public_path("assets/images/employers/" . $request->oldImageLogo));
                }
            }
            $user = User::where("slug", $slug)->first();

            $linkedinUrl = isset($request->linkedin) ? $request->linkedin : null;

            if ($user) {
                $linkedin = $user->socialMedia()->where('mediaName', 'linkedin')->first();

                // Update the LinkedIn URL if provided in the request
                if ($linkedin && isset($request->linkedin)) {
                    $linkedin->pivot->update(['value' => $linkedinUrl]);
                }
            }

            if (!$user) {
                throw new \Exception("User not found with slug: $slug");
            }
            $user->update($data);

            return redirect()
                ->route('employers.show', ['slug' => $user->slug])
                ->with(['messages' => json_encode(['success' => ['Data updated Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('employers.show', ['slug' => $slug])
                ->with(['messages' => json_encode(['error' => ['Error updating data: ' . $exception->getMessage()]])]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $slug): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = User::where("slug", $slug)->first();

            if (Gate::denies('isOwner', ['userId' => $user->id])) {
                throw new UnauthorizedException("Unauthorized");
            }

            if (!str_starts_with($user->image, 'default' . DIRECTORY_SEPARATOR)) {
                $this->deleteFile(public_path("assets/images/employers/" . $user->image));
            }

            $this->deleteFile(public_path("assets/images/employers/". $user->employerUser->logo));

            $user->delete();

            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['success' => ['Account deleted Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->route('index')
                ->with(['messages' => json_encode(['error' => ['Error deleting category: ' . $exception->getMessage()]])]);
        }
    }
}
