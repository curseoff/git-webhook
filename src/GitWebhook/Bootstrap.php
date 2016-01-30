<?php

namespace GitWebhook;

use GitWebhook\Platform\Github;

class Bootstrap
{
	public static function run()
	{
		try {
			$config_obj = new Config();
			$platform_obj = $config_obj->platform();
			$http_obj = new Http();
			$data = $platform_obj::parse($http_obj->request());
			Logger::console_log($data);
		}
		catch (\Exception $e) {
			Logger::error_log($e->getMessage());
			die('error');
		}
		
	}
}

