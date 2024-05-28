<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
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
        // Composer for the navbar view
        View::composer('layouts.navbar', function ($view) {
            if (Auth::check() && Auth::user()->role == 'siswa') {
                $encryptedPassword = Crypt::encryptString(Auth::user()->pwd_nohash);
                $view->with('encryptedPassword', $encryptedPassword);
            }
        });
    }
}
