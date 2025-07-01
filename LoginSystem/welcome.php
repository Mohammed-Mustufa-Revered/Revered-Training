<?php
session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit;
}

echo "<h2>Welcome, " . $_SESSION['USERNAME'] .  "!</h2>"; 
echo "<h2>Welcome, " .  "!</h2>";
echo "<hr> This Data got from session    ".$_SESSION['USERNAME'];
echo "<br>";
echo "<h2> Welcome to session page you are logged in Successfully ";
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
?>
