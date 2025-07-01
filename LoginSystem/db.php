<?php
$servername ="localhost";
$username = "admin";
$password = "securepassword";
$dbname = "auth_system";


try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    } catch (Exception $e) {
        die("". $e->getMessage());
}
/*
CREATE DATABASE IF NOT EXISTS auth_system;

USE auth_system;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/
?>
