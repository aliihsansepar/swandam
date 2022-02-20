<?php

namespace Swandam\Core;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Swandam\Core\Foundation\Swandam;
use Swandam\Core\Http\Middleware\AfterMiddleware;
use Swandam\Core\Http\Middleware\Authenticate;
use Swandam\Core\Http\Middleware\RedirectIfAuthenticate;
use Swandam\Core\Providers\RouteServiceProvider;

class SwandamServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(Swandam::class, Swandam::class);
        $this->app->bind('Swandam', Swandam::class);
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