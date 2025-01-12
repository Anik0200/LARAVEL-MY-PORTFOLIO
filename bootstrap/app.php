<?php

use App\Http\Middleware\Admin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        then: function () {

            Route::middleware('web')

                ->group(base_path('routes/frontend.php'));

        },

    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
        ]);
    })

    ->withProviders([
        App\Providers\AppServiceProvider::class,
        Laravolt\Avatar\ServiceProvider::class,

    ])

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
