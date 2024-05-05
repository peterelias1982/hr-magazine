<?php

namespace App\Providers;

use App\Enums\AdminPosition;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('crudUser', function (User $user) {
            $admin = Admin::where('user_id', $user->id)->first();

            if($admin && $user->position === AdminPosition::SuperAdmin->value) {
                return true;
            }

            return false;
        });

        Gate::define('viewAdminDashboard', function (User $user) {
            $admin = Admin::where('user_id', $user->id)->first();

            if($admin) {
                return true;
            }

            return false;
        });

        Gate::define('isOwner', function (User $user, int $userId) {
           if($userId!== $user->id) {
               return false;
           }

           return true;
        });

        Gate::define('isAdmin', function (User $user) {
            $admin = Admin::where('user_id', $user->id)->first();

            if(!$admin) {
                return false;
            }

            return true;
        });

    }
}
