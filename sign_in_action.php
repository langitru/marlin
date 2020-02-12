<?php

require_once $_SERVER['DOCUMENT_ROOT']."/db/config_db.php";

$data = $_POST;
if (isset($data['do_sign_in'])) {
  $errors = array();
  $user = R::findOne('users', 'name = ?', array($data['name']));
  if ($user) {
    //логин существует
    if (password_verify($data['password'], $user->password)) {
      //логиним
      $_SESSION['logged_user'] = $user;
      header('location: /');
    } else {
    $errors[] = 'Пароль введен не верно';
  }
  } else {
    $errors[] = 'Пользователь с таким логином не найден';
  }
  if (!empty($errors)) {
    echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
  } 
}

