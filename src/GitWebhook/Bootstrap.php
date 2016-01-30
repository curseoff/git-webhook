<?php

namespace GitWebhook;

class Bootstrap
{
	public static function run()
	{
		try {
			$config = Config::load();

			switch(mb_strtolower($config['PLATFORM'])) {
				case 'github':
					$data = \GitWebhook\Platform\Github::get();

					 Logger::console_log($data);
			
				break;
			}
			
		}
		catch (\Exception $e) {
			Logger::error_log($e->getMessage());
			die('error');
		}
		
	}
}

