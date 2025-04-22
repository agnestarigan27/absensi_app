<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;

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
    public function boot()
{
    Auth::viaRequest('custom-token', function ($request) {
        foreach (['siswa', 'guru', 'operator', 'orangtua'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::shouldUse($guard);
                return Auth::guard($guard)->user();
            }
        }
    });
}
}
