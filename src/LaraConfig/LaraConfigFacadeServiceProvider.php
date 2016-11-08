<?php

namespace LaraConfig;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Config\Repository as ConfigRepository;

class LaraConfigFacadeServiceProvider extends ServiceProvider
{

    protected $cache;
    protected $config;

    public function __construct(CacheRepository $cache,ConfigRepository $config)
    {
        $this->cache = $cache;
        $this->config = $config;
    }

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
        $this->app->bind('laraconfig.facades',function(){
            return new LaraConfigRepository($this->cache,$this->config);
        });
    }
}
