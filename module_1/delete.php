<?php

include 'helper.php';
$db = include 'database/start.php';


$post = $db->deleteOne('posts', $_GET['id']);

header('location: /module_1/index.php');
