##Laravel 5 key value configurations using database

This package is for laravel cache learning purpose.Using laravel cache for creating config like wordpress which is stored on cache loaded from table config


installation
```
    "tajul/lara-config" : "dev-master"
```


publish vendor
```
    php artisan vendor:publish --provider=LaraConfig\LaraConfigServiceProvider

```

run migration
```
    php artisan migrate 
```

register laraconfig services provider

```
    LaraConfig\LaraConfigServiceProvider::class,
    LaraConfig\LaraConfigFacadeServiceProvider::class,
```

Register for facades alias
```php

    'LaraConfig' => LaraConfig\Facades\LaraConfigRepository::class,

```


Basic usage
```php
   
    use LaraConfig\LaraConfigRepository;

    class ConfigController extends Controller
    {
    
        public function configRouteBind(LaraConfigRepository $config) {
            $config->all();
        }
    }
```


Insert new Value
```php
    
    use LaraConfig\LaraConfigRepository;


    class ConfigController extends Controller
    {
    
        public function configRouteBind(LaraConfigRepository $config) {
            try
            {
                $config->set('key','value');
            }
            catch(Exception $e) {

                return $e->getMessage();
            }
        }
    }
```

get config by key
```php
    
    use LaraConfig\LaraConfigRepository;


    class ConfigController extends Controller
    {
    
        public function configRouteBind(LaraConfigRepository $config) {
            $config->get('key');
            //if key are not exists return null
        }
    }
```

Or by using facades
```php
    
    use LaraConfig\LaraConfigRepository;
    

    class ConfigController extends Controller
    {
    
        public function configRouteBind() {
           \LaraConfig::all();
        }
    }
```

Available methods
```php
       
    //get all config key and values
    \LaraConfig::all();
    
    //get config value using key
    \LaraConfig::get('key');
    
    //set new config value using key
     \LaraConfig::set('key','value);
    
```