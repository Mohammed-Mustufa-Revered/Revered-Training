<?php 
// header ('Content-type: application/json');
// header ('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Method: POST');
// header ('Access-Control-Allow-Headers: Access-control-Allow-headers,conten-type,
// Aceess-Control-Allow-Methods,Authorization,X-Request-With');
// include "dbconfig.php";
// $data = json_decode(file_get_contents("php://input"), true);
// $sid = $data["id"];
// $Fname = $data["FirstName"];
// $Lname = $data["LastName"];
// $age = $data["Age"];
// $home = $data["Hometown"];
// $role = $data["Job"];
// try {
// $sql = "INSERT INTO Persons(id,FirstName,LastName,Age,Hometown,Job) VALUES ($sid','$Fname','$Lname','$age','$home','$role')";
// if(mysqli_query($conn, $sql))
// {

//     echo json_encode(array("status"=>  true ,"message"=> " data inserted Succressfull"));
// }
//  else {
//      echo json_encode(array("status"=>  false ,"message"=> " data inserted Succressfull"));
// }
// }
//  catch (mysqli_sql_exception $e) {
//     echo json_encode(array("error"=> $e->getMessage()),0);

 
// }


 // To tell the browser: "I'm sending JSON data."
header('Content-Type: application/json');
// To allow cross-origin requests (CORS), e.g., frontend from http://localhost:3000 calling this PHP API.
header('Access-Control-Allow-Origin: *');
// To allow only post method origin
header('Access-Control-Allow-Methods: POST');
// To allow custom request headers (like Authorization, Content-Type) in cross-origin requests.
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include "dbconfig.php";

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// real_escape_string() use to skip special character it sanitize the string and prevent use from sql injection

// Extract and sanitize inputs
// $sid   = intval($data["id"]);
// $Fname = mysqli_real_escape_string($conn, $data["FirstName"]);
// $Lname = mysqli_real_escape_string($conn, $data["LastName"]);
// $age   = intval($data["Age"]);
// $home  = mysqli_real_escape_string($conn, $data["Hometown"]);
// $role  = mysqli_real_escape_string($conn, $data["Job"]);


$sid   = intval($data["sid"]);
$Fname = $data["Fname"];
$Lname = $data["Lname"];
$age   = intval($data["age"]);
$home  = $data["home"];
$role  = $data["role"];

try {
    $sql = "INSERT INTO Persons (id, FirstName, LastName, Age, Hometown, Job) 
            VALUES ($sid, '$Fname', '$Lname', $age, '$home', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("status" => true, "message" => "Data inserted successfully"));
    } else {
        echo json_encode(array("status" => false, "message" => "Failed to insert data"));
    }
} catch (mysqli_sql_exception $e) {
    echo json_encode(array("error" => $e->getMessage()));
}


?>