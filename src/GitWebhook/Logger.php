<?php

namespace GitWebhook;

class Logger
{
	public static function error_log($body)
	{
		$write_file_path = realpath(Config::LOG_PATH . '/error.log');
		file_put_contents($write_file_path, date('Y-m-d H:i:s ') . $body . "\n", FILE_APPEND);
	}

	public static function console_log($body)
	{
		$data = 'date: ' . date("Y-m-d H:i:s") . "\n";
		$data .= print_r($body, TRUE) . "\n";

		$write_file_path = realpath(Config::LOG_PATH . '/console.log');
		file_put_contents($write_file_path, $data, FILE_APPEND);
	}
}

