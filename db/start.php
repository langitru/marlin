<?php


$config = include __DIR__ . '/../config/config.php';
include __DIR__ . '/../app/components/QueryBuilder.php';
include __DIR__ . '/Connection.php';


return new QueryBuilder(Connection::make($config['database']));