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

added into app.php

```
    LaraConfig\LaraConfigServiceProvider::class
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
