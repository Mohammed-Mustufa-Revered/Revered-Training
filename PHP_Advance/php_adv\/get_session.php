<?php
session_start();
if(isset($_SESSION["USERNAME"])){
echo " username is".$_SESSION['USERNAME'];
echo "<br>";
echo "Your catogire is ".$_SESSION['CATEGORIE'];
echo "<br>";
echo " we get the data";
echo "<br>";
}
else {
    echo "Your session is closed and destroyed";
}
?>