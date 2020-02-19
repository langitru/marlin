<?php

include __DIR__ . '/../'.'module_1/helper.php';
// $db = include 'module_1/database/start.php';




$routes = [
  '/' => 'home.php',
  '/module_one' => 'module_1/module_1.index.php',

];

$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routes)){
  // dd($routes[$route]);
  include __DIR__ . '/../'. $routes[$route]; exit;
} else {
  dd(404);
}



// $posts = $db->getAll('posts');

// 4. Вывести данные на странице 
// include 'module_1/view.php';
// include 'home.php';

