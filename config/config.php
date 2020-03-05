<?php

namespace Config;

class Config 
{
	private static $db = [
			"connection" => "mysql:host=localhost",
			"dbname" => "marlin_module_1",
			"charset" => "utf8",
			"username" => "root",
			"password" => ""
		];

	public static function getDB()
	{

		return self::$db['connection'].';dbname='.self::$db['dbname'].';charset='.self::$db['charset'].';';
	}

	public static function getUser()
	{

		return self::$db['username'];
	}

	public static function getPWD()
	{

		return self::$db['password'];
	}

}