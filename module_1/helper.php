<?php 

function getAllPosts(){
  // 1. Содиниться с БД
  $pdo = new PDO('mysql:host=localhost;dbname=marlin_module_1;charset=utf8;', 'root', '');

  // 2. Выполнить запрос к БД
  $sql = 'SELECT * from posts';
  $statement = $pdo->prepare($sql); // подготовить запрос
  $statement->execute(); // выполниь запрос

  // 3. Получить массив данных
  $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $posts;
}

function dd($data) {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
	die;
}