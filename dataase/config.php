<?php
/**
 * Configuration for database connection
 * 
 */
$host = "localhost"; //used to create DB
$username = "root";
$password = "Kofi@2004";
$dbname = "Customers"; // will use later
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
 );