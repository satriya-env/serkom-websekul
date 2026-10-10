<?php

namespace App\Providers;

use App\Models\sosmed;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

// use Illuminate\Support\Facades\URL;

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
        //

        // if ($this->app->environment('production', 'local')) {
        //     URL::forceScheme('https');
        // } 
        View::composer('public.temp', function($view){
            $view->with('sosmed', sosmed::all());
        });
    }
}
