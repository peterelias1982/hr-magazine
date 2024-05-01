<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait ResetPassword
{

    public function reset($slug)
    {
        try {
            $user = User::where('slug', $slug)->first();
            $user->update(['password' => Hash::make('123456789')]);
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['success' => ['User resetPassword Successfully']])]);
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with(['messages' => json_encode(['error' => ['Error resetPassword user: ' . $exception->getMessage()]])]);
        }
    }
}
