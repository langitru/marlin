<?php

include 'helper.php';
$db = include 'database/start.php';

$db->create(
	'posts', 
	[
		'title' => $_POST['title'],
		// 'email' => 'asd@qwe',
		// 'content' => 'qwe',
	],
);
header('location: /module_1/index.php');
