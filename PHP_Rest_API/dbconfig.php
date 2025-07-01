<?php
$servername = "localhost";
$username = "admin";
$password = "securepassword";
$dbname = "test";

try {
$conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die("". $e->getMessage());
}

?>