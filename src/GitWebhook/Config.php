<?php

namespace GitWebhook;

class Config {
	const ROOT_DIR = __DIR__;
	const LOG_PATH = __DIR__ . '/../../logs';

	private $config;

	public function __construct()
	{
		$config_path = realpath(self::ROOT_DIR . '/../config/repository.yml');

		if ( ! file_exists($config_path)) {
			throw new \Exception('File not found: ' . $config_path);
		}

		$this->config =  \Spyc::YAMLLoad($config_path);
	}

	public function load()
	{
		return $this->config;
	}

	public function platform()
	{
		if ( ! in_array($this->config['PLATFORM'], ['github'])) throw new \Exception('Undefined platform: ', $this->config['PLATFORM']);
		$class_name = sprintf("GitWebhook\\Platform\\%s", ucfirst($this->config['PLATFORM']));
		return $class_name::get_instance();
	}
}