<?php
/**
 * Created by PhpStorm.
 * User: Tajul
 * Date: 11/8/2016
 * Time: 11:31 AM
 */

namespace LaraConfig\Facades;

use Illuminate\Support\Facades\Facade;

class LaraConfigRepository extends Facade
{
    protected static function getFacadeAccessor() { return 'laraconfig.facades'; }
}