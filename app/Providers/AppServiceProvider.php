<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Footer;
use App\Models\Service;
use App\Models\User;
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
        view()->composer(
            'layouts.frontend',
            function ($view) {
                $view->with('user', User::where('role', 'admin')->first());
            }
        );

        view()->composer(
            'frontend.inc.Banner',
            function ($view) {
                $view->with('banner', Banner::first());
            }
        );

        view()->composer(
            'frontend.inc.Footer',
            function ($view) {
                $view->with('footer', Footer::first());
            }
        );
    }
}
