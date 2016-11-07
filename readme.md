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


Basic usage
```php
    

    use Illuminate\Config\Repository as ConfigRepository;
    use Illuminate\Cache\Repository as CacheRepository;
    use LaraConfig\LaraConfigRepository;


    class ConfigController extends Controller
    {
    
        public function configRouteBind(CacheRepository $cache,ConfigRepository $config) {

            $configurations = new LaraConfigRepository($cache,$config);
            $configurations->getCachedConfig();
        }
    }
```


Insert new Value
```php
    

    use Illuminate\Config\Repository as ConfigRepository;
    use Illuminate\Cache\Repository as CacheRepository;
    use LaraConfig\LaraConfigRepository;


    class ConfigController extends Controller
    {
    
        public function configRouteBind(CacheRepository $cache,ConfigRepository $config) {

            $configurations = new LaraConfigRepository($cache,$config);
            try
            {
                $configurations->setNewConfig('key','value');
            }
            catch(Exception $e) {

                return $e->getMessage();
            }
        }
    }
```

get config by key
```php
    

    use Illuminate\Config\Repository as ConfigRepository;
    use Illuminate\Cache\Repository as CacheRepository;
    use LaraConfig\LaraConfigRepository;


    class ConfigController extends Controller
    {
    
        public function configRouteBind(CacheRepository $cache,ConfigRepository $config) {

            $configurations = new LaraConfigRepository($cache,$config);
            $configurations->getDataByKey('key');
            //if key are not exists return null
        }
    }
```
