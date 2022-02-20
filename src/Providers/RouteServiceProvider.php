<?php

namespace Swandam\Core\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/swandam';

    public function boot()
    {
        parent::boot();
        $this->configureRateLimiting();
        $this->panelRoutes();
//        $this->webRoutes();
    }

    protected function panelRoutes()
    {
        Route::middleware('web')
            ->prefix('swandam')
            ->as('swandam.')
            ->group(function ($router) {
                $adm_routes = __DIR__ . '/../Routes/panel.php';
                if (is_file($adm_routes)) {
                    include_once $adm_routes;
                }
            });
    }

    protected function webRoutes()
    {

    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('panel', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}