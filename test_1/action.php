<?php


function registration($post){

  require_once $_SERVER['DOCUMENT_ROOT']."/test_1/db/config_db.php";
  if (isset($post['do_sign_up'])) {
   // регистрируем
    $errors = array();
    if (trim($post['name']) == '') {
      $errors[] = 'Введите логин';
    }
    if (trim($post['email']) == '') {
      $errors[] = 'Введите Email';
    }
    if ($post['password'] == '') {
      $errors[] = 'Введите пароль';
    }  
    if ($post['password_c'] != $post['password']) {
      $errors[] = 'Повторный пароль введен не верно';
    }   
    if (empty($errors)) {
     // ошибок нет, регистрируем

      $sql = "INSERT INTO users (name, email, password, join_date) VALUES (:name, :email, :password, :join_date)";

      $statement = $pdo->prepare($sql);
      $statement->bindParam(":name", $post['name']);
      $statement->bindParam(":email", $post['email']);
      $statement->bindParam(":password", password_hash($post['password'], PASSWORD_DEFAULT));
      $statement->bindParam(":join_date", time());
      $statement->execute();

      header('location: /test_1/index.php');
    } 
    else {
      echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    } 
  }

}

function autorization($post){
  require_once $_SERVER['DOCUMENT_ROOT']."/test_1/db/config_db.php";
  if (isset($post['do_sign_in'])) {
      $errors = array();

    $sql = "SELECT * FROM users";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $users = $statement->fetchALL(PDO::FETCH_ASSOC);
    foreach ($users as $user){
      if (in_array($post['name'], $user)){
        //логин существует, проверяем пароль
        if (password_verify($post['password'], $user['password'])) {
            //логиним
            $_SESSION['logged_user'] = $user['name'];
            header('location: /test_1/index.php');
        } else {
            $errors[] = 'Пароль введен не верно';
            }
      } else {
          $errors[] = 'Пользователь с таким логином не найден';
          }
      }
      
    if (!empty($errors)) {
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    } 
  }

}


if (isset($_POST['do_sign_up'])) {
  registration($_POST);
} elseif (isset($_POST['do_sign_in'])) {
  autorization($_POST);
}