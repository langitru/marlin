<?php
// Start a Session
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

use MyComponents\Router;
new Router();
