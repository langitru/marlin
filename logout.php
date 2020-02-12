<?php

require_once $_SERVER['DOCUMENT_ROOT']."/db/config_db.php";
unset($_SESSION['logged_user']);
header('location: /');
exit();