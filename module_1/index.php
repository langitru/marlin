<?php

include 'helper.php';
$db = include 'database/start.php';


$posts = $db->getAll('posts');

// 4. Вывести данные на странице 
include 'view.php';

