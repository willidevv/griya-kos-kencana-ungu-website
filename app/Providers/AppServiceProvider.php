<?php

namespace App\Providers;

use App\Models\User;
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
        // CUKUP TAMBAHKAN / PERBAIKAN DI BAGIAN INI SAJA:
        // Menghubungkan teks 'super-admin-only' di route dengan kolom role 'super_admin' di database
        Gate::define('super-admin-only', function (User $user) {
            return $user->role === 'super_admin';
        });
    }
}