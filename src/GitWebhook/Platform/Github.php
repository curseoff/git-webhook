<?php

namespace GitWebhook\Platform;

class Github
{
	public static function get() {
		$data = json_decode(file_get_contents(__DIR__ . '/../../../example/github.json'), TRUE);
		#$data = $_POST;
		return self::parse($data);
	}
	public static function parse($data) {
		$data = json_decode($data['payload'], TRUE);
		$parse = [
			'branch' =>substr($data['ref'], strlen('refs/heads/')),
			'author' =>$data['head_commit']['author'],
			'commit' =>  [
				'id' => $data['head_commit']['id'],
				'message' => $data['head_commit']['message'],
				'timestamp' => $data['head_commit']['timestamp'],
			],
		];

		return $parse;
	}
}