<?php

require_once $_SERVER['DOCUMENT_ROOT']."/test_1/db/config_db.php";
unset($_SESSION['logged_user']);
header('location: /test_1/index.php');
exit();