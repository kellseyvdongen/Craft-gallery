<?php

namespace App\Providers;

use Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('admin', function (User $user) {
            return $user->isAdmin() ? Response::allow() : Response::denyAsNotFound();
        });
    }
}
