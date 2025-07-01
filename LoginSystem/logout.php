<?php
session_start();
$SESSION = array();
 session_unset();
 session_destroy();

header("Location: login.php");

exit;
?>
