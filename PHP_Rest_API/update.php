<?php
$sid   = intval($data["sid"]);
$Fname = $data["Fname"];
$Lname = $data["Lname"];
$age   = intval($data["age"]);
$home  = $data["home"];
$role  = $data["role"];

try {
    $sql = "UPDATE  Persons SET FirstName = $Fname, LastName, Age, Hometown, Job) WHERE id = $sid 
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