<?php
require_once 'C:\xampp\htdocs\dataase\config.php'; //access the login values

try {
 $connection = new PDO($dsn, $username, $password, $options);
 echo 'DB connected <br>';
} catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
} 
?>
