<?php 
header ('Content-type: application/json');
header ('Access-Control-Allow-Origin: ');
include "dbconfig.php";
$data = json_decode(file_get_contents("php://input"), true);
$sid = $data["sid"];
try {
$sql = "DELETE FROM Persons WHERE id = $sid";
IF( mysqli_query($conn, $sql)){

echo json_encode(array("status"=> "success","message"=> "Data deleted"));

}
     else {
echo json_encode(array("status"=> "error","message"=> "no records found"));
}
} catch (mysqli_sql_exception $e) {
    echo json_encode(array("error"=> $e->getMessage()),0);
}