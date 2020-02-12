<?php

//подключаем библиотеку ORM RedBeanPHP
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/rb.php";

//подключаемся к mysql
R::setup('mysql:host=localhost;dbname=test1', 'root', '' );

// R::setup( 'mysql:host=localhost;dbname=mydatabase', 'user', 'password' ); //for both mysql or mariaDB


//запускаем сессию
session_start();
