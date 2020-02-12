<?php


require_once $_SERVER['DOCUMENT_ROOT']."/db/config_db.php";

$data = $_POST;
if (isset($data['do_sign_up'])) {
 // регистрируем
  $errors = array();
  if (trim($data['name']) == '') {
    $errors[] = 'Введите логин';
  }
  if (trim($data['email']) == '') {
    $errors[] = 'Введите Email';
  }
  if ($data['password'] == '') {
    $errors[] = 'Введите пароль';
  }  
  if ($data['password_c'] != $data['password']) {
    $errors[] = 'Повторный пароль введен не верно';
  }
  if ( R::count('users', "name = ?", array($data['name'])) > 0 ) {
    $errors[] = 'Пользователь с таким логином уже существует!';
  } 
  if ( R::count('users', "email = ?", array($data['email'])) > 0 ) {
    $errors[] = 'Пользователь с таким Email уже существует!';
  }    
  if (empty($errors)) {
   // ошибок нет, регистрируем
    $user = R::dispense('users'); // создания новой таблицы в базе
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    $user->join_date = time();
    $id = R::store($user);
   // echo '<div style="color:green;">Вы успешно зарегистрировались!</div><hr>';
    header('location: /');
  } 
  else {
    echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
  } 
}
