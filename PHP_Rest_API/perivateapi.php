<?php 
header ('content-type : application/json');
header ('Access-Control-Allow-Origin: ');
include "dbconfig.php";
$data = json_decode(file_get_contents("php://input"), true);
$sid = $data["id"];
try {
$sql = "SELECT * FROM Persons WHERE id = {$sid}";
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

 
// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');

// include "dbconfig.php";

// // Read and decode JSON input
// $data = json_decode(file_get_contents("php://input"), true);

// // Validate input
// if (!isset($data["id"]) || !is_numeric($data["id"])) {
//     echo json_encode(["error" => "Invalid or missing ID"]);
//     exit;
// }

// $sid = intval($data["id"]);

// try {
//     // Use prepared statement to avoid SQL injection
//     $stmt = $conn->prepare("SELECT * FROM Persons WHERE id = ?");
//     $stmt->bind_param("i", $sid);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $output = $result->fetch_all(MYSQLI_ASSOC);
//         echo json_encode($output);
//     } else {
//         echo json_encode(["error" => "No records found"]);
//     }

//     $stmt->close();
// } catch (mysqli_sql_exception $e) {
//     echo json_encode(["error" => $e->getMessage()]);
// }
?>

