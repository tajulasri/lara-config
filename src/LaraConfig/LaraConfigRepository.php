<?php

namespace LaraConfig;

use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Config\Repository as ConfigRepository;
use LaraConfig\Exceptions\LaraConfigException;
use LaraConfig\Entity\Configuration;

class LaraConfigRepository  {

	/**
	 * cache Repository
	 * @var [type]
	 */
	protected $cache;

	/**
	 * config repository
	 * @var [type]
	 */
	protected $config;

	/**
	 * lara config array
	 * @var array
	 */
	protected $laraConfig = [];

	/**
	 * config file name
	 * @var string
	 */
	protected static $configFile = 'laraconfig.';


	/**
	 * laraconfig constructor
	 * @param CacheRepository  $cache  [description]
	 * @param ConfigRepository $config [description]
	 */
	public function __construct(CacheRepository $cache,ConfigRepository $config){
		$this->cache = $cache;
		$this->config = $config;
		$this->loadConfig();
		$this->laraConfig = $this->getCachedConfig();
	}

	/**
	 * load config
	 * @return [type] [description]
	 */
	protected function loadConfig() {
		if($this->hasConfig()) {
			$this->cache->forget($this->config->get(static::$configFile.'name'));
			$this->loadCacheData();
		}
		else {

			$this->loadCacheData();
		}
	}

	/**
	 * get Data by key
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function getDataByKey($key = null) {

		if(!is_null($key)) {
			if(array_key_exists($key, $this->laraConfig)) {
				return $this->laraConfig[$key];
			}
		}
		else {

			throw new InvalidArgumentException("provided key are null { $key }.");
		}
	}

	/**
	 * new config key insertion
	 * @param [type] $key   [description]
	 * @param [type] $value [description]
	 */
	public function setNewConfig($key,$value) {

		if(! array_key_exists($key,$this->laraConfig)) {
			Configuration::create(['key' => $key,'value' => $value]);
		}
		else {

			throw new LaraConfigException("config key already exists. {$key} .");
		}
	}

	/**
	 * get cached config
	 * @return [type] [description]
	 */
	public function getCachedConfig() {
		return $this->cache->get($this->config->get(static::$configFile.'name'));
	}

	/**
	 * [hasConfig description]
	 * @return boolean [description]
	 */
	protected function hasConfig() {
		return $this->cache->has($this->config->has(static::$configFile.'name'));
	}

	/**
	 * [loadCacheData description]
	 * @return [type] [description]
	 */
	protected function loadCacheData() {
		$configurations = Configuration::all()->pluck('value','key')->toArray();
		$this->cache->put($this->config->get(
			static::$configFile.'name'),$configurations,
			$this->config->get(static::$configFile.'duration'
				)
			);
	}
}