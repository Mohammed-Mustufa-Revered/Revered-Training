<?php 
header ('content-type : application/json');
header ('Access-Control-Allow-Origin: *');
include "dbconfig.php";
try {
$sql = "SELECT * FROM Persons";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result);
    echo json_encode($output, MYSQLI_ASSOC);
} else {
    echo json_encode(array("error"=> ""),0);
}
} catch (mysqli_sql_exception $e) {
    echo json_encode(array("error"=> $e->getMessage()),0);
}
?>