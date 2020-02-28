<?php

/**
 * 
 */
namespace MyComponents;
use PDO;

class Connection
{
	public static function make($config)
	{
		// 1. Соединяемся с БД
		// var_dump($config);die;
		return new PDO(
			"{$config['connection']};dbname={$config['dbname']};charset={$config['charset']};", 
			"{$config['username']}", 
			"{$config['password']}"
		);
	}
}