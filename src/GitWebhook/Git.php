<?php

namespace GitWebhook;

class Git
{
	public function command($command)
	{
		$config = Config::load();
		$repository_path = $config['REPOSITORY_PATH'];

		$command .= sprintf('cd %s;', $repository_path) . $command;
		return trim(shell_exec($command));
	}
}