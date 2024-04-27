/*CREATE DATABASE web;*/
 use web; 
 CREATE TABLE service ( 
 id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 problem VARCHAR(30) NOT NULL,
 device_model VARCHAR(30) NOT NULL,
 device_os VARCHAR(50) NOT NULL,
 user VARCHAR(30) NOT NULL
 );
