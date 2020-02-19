<?php

// include 'module_1/helper.php';
$db = include __DIR__ . '/database/start.php';





$posts = $db->getAll('posts');

// 4. Вывести данные на странице 
include 'view.php';

