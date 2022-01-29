<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();

        gate::define('superadmin', function(User $user)
        {
            return $user->role === 'superadmin';
        });

        gate::define('ketua', function(User $user)
        {
            return $user->role === 'ketua';
        });

        gate::define('anggota', function(User $user)
        {
            return $user->role === 'anggota';
        });

        gate::define('user', function(User $user)
        {
            return $user->role === 'user';
        });
    }
}
