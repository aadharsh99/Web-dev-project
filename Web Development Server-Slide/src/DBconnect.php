<?php
// Current directory path
$currentDirectory = __DIR__;

// Go back one directory
$parentDirectory = dirname($currentDirectory);

$location = $parentDirectory.'/config.php';

require_once $location; //access the login values

try {
 $connection = new PDO($dsn, $username, $password, $options);
 //echo 'DB connected <br>';
} catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
} 


