<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Trait ResetPassword {
    public function Reset($slug){
        $user = User::where('slug',$slug)->first();
        $user->update(['password'=>Hash::make('123456789')]);
    }
}
