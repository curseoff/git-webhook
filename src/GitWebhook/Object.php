<?php

namespace GitWebhook;

trait Object
{
	public static function get_instance()
	{
		static $self;

		if ($self === NULL) {
			$self = new self();
		}

		return $self;
	}
}