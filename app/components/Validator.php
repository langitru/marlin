<?php


/**
 Validator   - компонент для валидации входящих данных;

 length($title)  - проверяет длину строки;
 email($email)   - проверяет электронную почту на корректностноть ввода;
 phone($phone)   - проверяет телефон на корректностноть ввода;
 http($host)     - проверяет URL на корректностноть ввода;
 */

namespace MyComponents;

class Validator 
{

	public static function length($string)
	{
		if (strlen($string) < 5 ){
			return false;
		} else {
			return true;
		}
	}

	public static function email($email)
	{

		return preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email);	
	}

	// Регулярное выражение для проверки корректности номера телефона
	// (пример: «+7-923-923-99-22»)
	public static function phone($phone)
	{

		return preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$/', $phone);	
	}

	//Регулярное выражение для проверки корректности URL
	// (пример: «http://www.my-site.com»)
	public static function http($host) 
	{

		return preg_match('/^((https?|ftp)\:\/\/)?([a-z0-9]{1})((\.[a-z0-9-])|([a-z0-9-]))*\.([a-z]{2,6})(\/?)$/', $host);	
	}


}