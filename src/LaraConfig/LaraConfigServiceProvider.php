<?php

namespace LaraConfig;

use Illuminate\Support\ServiceProvider;

class LaraConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
       		 __DIR__.DIRECTORY_SEPARATOR.'migrations/' => database_path('migrations')
    	], 'migrations');

    	 $this->publishes([
        	__DIR__.DIRECTORY_SEPARATOR.'config/laraconfig.php' => config_path('courier.php'),
    	]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
        	__DIR__.'/config/laraconfig.php', 'laraconfig'
    	);
    }
}
