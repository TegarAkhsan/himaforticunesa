<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Departemen;
use App\Models\File;

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
        if ($this->app->environment('production') || request()->header('X-Forwarded-Proto') === 'https') {
            $_SERVER['HTTPS'] = 'on';
            \Illuminate\Support\Facades\URL::forceScheme('https');
            \Illuminate\Support\Facades\Config::set('app.url', 'https://himafortic.mi.unesa.ac.id');
        }

        View::composer('layouts.navbar', function ($view) {
            $departemen = Departemen::all();
            $files = File::latest()->take(10)->get();

            $view->with([
                'departemen' => $departemen,
                'files' => $files,
            ]);
        });
    }
}