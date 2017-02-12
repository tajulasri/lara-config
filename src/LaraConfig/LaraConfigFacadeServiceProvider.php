<?php

namespace LaraConfig;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Config\Repository as ConfigRepository;
use LaraConfig\Entity\Configuration;

class LaraConfigFacadeServiceProvider extends ServiceProvider
{

    /**
     * defer
     * @var boolean
     */
    protected $defer = false;

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
        $this->app->bind('laraconfig.facades', function ($app) {
            return new LaraConfigRepository(
                $app->make(Illuminate\Cache\Repository::class),
                $app->make(Illuminate\Config\Repository::class),
                $app->make(laraConfig\Entity\Configuration::class)
            );
        });
    }

    public function provides()
    {
        return ['laraconfig.facades'];
    }
}
