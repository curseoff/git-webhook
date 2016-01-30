<?php

namespace GitWebhook;

class Autoloader
{
	public static function load($class_name) {
		$path = realpath(__dir__ . '/../' . str_replace('\\', '/', $class_name) . '.php');
		if ($path === false) throw new \Exception('class undefined  ' . $class_name, 1);
		require $path;
	}
}

spl_autoload_register('GitWebhook\Autoloader::load');