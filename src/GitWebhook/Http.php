<?php

namespace GitWebhook;

use GitWebhook\Platform\Github;

class Http
{
	public function request() {
		$request = json_decode(file_get_contents(__DIR__ . '/../../example/github.json'), TRUE);
		$request = $_POST;
		return $request;
	}

	
}

