<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });

        // Mendifinisikan aturan hak akses baru dengan nama 'manage-category'
        // Hanya user yang memiliki role 'admin' yang mendapatkan nilai true (boleh mengakses)
        Gate::define('manage-category', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
