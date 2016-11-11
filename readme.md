##Laravel 5 key value configurations using database

This package is for laravel cache learning purpose.Using laravel cache for creating config like wordpress which is stored on cache loaded from table config


installation
```
    "tajul/lara-config" : "dev-master"
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


publish vendor
```
    php artisan vendor:publish --provider=LaraConfig\LaraConfigServiceProvider

```


publish vendor dirty ways
```
    php artisan vendor:publish

```

run migration
```
    php artisan migrate 
```


Basic usage
```php
   
    use LaraConfig\LaraConfigRepository;

    class ConfigController extends Controller
    {
    
        public function configRouteBind(LaraConfigRepository $config) {
            $config->getCachedConfig();
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
                $config->setNewConfig('key','value');
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
            $config->getDataByKey('key');
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
           \LaraConfig::getCachedConfig();
        }
    }
```

Available methods
```php
       
    //get all config key and values
    \LaraConfig::getCachedConfig();
    
    //get config value using key
    \LaraConfig::getDataByKey('key');
    
    //set new config value using key
     \LaraConfig::setNewConfig('key','value);
    
```