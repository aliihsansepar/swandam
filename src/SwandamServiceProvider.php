<?php

namespace Swandam\Core;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Swandam\Core\Http\Middleware\AfterMiddleware;
use Swandam\Core\Http\Middleware\Authenticate;
use Swandam\Core\Http\Middleware\RedirectIfAuthenticate;

class SwandamServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app->setLocale(session('panel.language.code', 'tr'));

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/swandam')
        ], 'swandam');

        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('web', AfterMiddleware::class);
        $router->aliasMiddleware('auth', Authenticate::class);
        $router->aliasMiddleware('guest', RedirectIfAuthenticate::class);
    }

}