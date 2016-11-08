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
        $this->app->when('laraconfig.facades')->needs('CacheRepository','ConfigRepository')->give('LaraConfigRepository');
    }
}
