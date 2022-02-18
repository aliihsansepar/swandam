<?php

namespace Swandam\Core;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SwandamServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->publishes([
          /*  __DIR__ . '/../Config/swandam.php' => config_path('swandam.php'),
            __DIR__ . '/../Resource/lang' => $this->app->langPath('vendor/swandam'),
            __DIR__ . '/../Resources/views/web' => resource_path('views/vendor/swandam'),*/
            __DIR__ . '/../Assets' => public_path('vendor/swandam'),
        ], 'swandam-assets');

//        $this->loadRoutesFrom(__DIR__ . '/../Route/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Resource/lang/web', 'swandam');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views/web', 'swandamWeb');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views/panel', 'swandam');
    }

}