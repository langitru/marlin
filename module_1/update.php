<?php

include 'helper.php';
$db = include 'database/start.php';

$db->update(
	'posts', 
	$_POST,

);
header('location: /module_1/index.php');
// var_dump($_POST);