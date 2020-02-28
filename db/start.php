<?php

use MyComponents\QueryBuilder;
// use \DB;



$config = require __DIR__ . '/../config/config.php';
// require __DIR__ . '/../app/components/QueryBuilder.php';
require __DIR__ . '/Connection.php';

return new QueryBuilder(Connection::make($config['database']));