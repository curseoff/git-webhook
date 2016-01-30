<?php

namespace GitWebhook;

class Config {
	const ROOT_DIR = __DIR__;
	const LOG_PATH = __DIR__ . '/../../logs';
	public static function load() 
	{
		static $config;

		if ($config === NULL) {
			$config_path = realpath(self::ROOT_DIR . '/../config/repository.yml');
			
			if ( ! file_exists($config_path)) {
				throw new \Exception('File not found: ' . $config_path);
			}

			$config =  \Spyc::YAMLLoad($config_path);
		}

		return $config;
	}
}