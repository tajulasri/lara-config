<?php

namespace LaraConfig;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Config\Repository as ConfigRepository;

class LaraConfigFacadeServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laraconfig.facades',function($app){
            return new LaraConfigRepository(
                $app->make('Illuminate\Cache\Repository'),
                $app->make('Illuminate\Config\Repository')
            );
        });
    }

    public function provides()
    {
        return ['laraconfig.facades'];
    }
}
