<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// $search_value = $_POST["search"];

// $conn = mysqli_connect("localhost","admin","securepassword","test") or die("Connection failed");
// $sql = $sql = "SELECT * FROM Persons WHERE FirstName LIKE '%$search_value%' OR LastName LIKE '%$search_value%'";
 
// $result = mysqli_query($conn, $sql) or die("". mysqli_error($conn));

// $output = "";
// if(mysqli_num_rows($result) > 0){
//  $output = '<table   border ="1" cellspacing="0" cellpadding = "10px" >
//  <tr>
//  <th>ID</th>
//  <th>First Name</th>
//  <th>Last Name</th>
//  </tr>
//  ';
  
 
 
//     while($row = mysqli_fetch_assoc($result)){
// $output.="<tr><td>{$row["id"]}</td> <td>{$row["FirstName"]}</td> <td>{$row["LastName"]}</td></tr>"; 
// }
// $output.= "</table>";
// mysqli_close($conn);
// echo $output;
// }
// else {
//     echo "<h2>no record found </h2>";
// }










error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "admin", "securepassword", "test") or die("Connection failed");

$search_value = isset($_POST["search"]) ? $_POST["search"] : '';

if ($search_value == "") {
    $sql = "SELECT * FROM Persons";  // Load all records when search box is empty
} else {
    $sql = "SELECT * FROM Persons WHERE FirstName LIKE '%$search_value%' OR LastName LIKE '%$search_value%'";
}

$result = mysqli_query($conn, $sql) or die("Query Failed: " . mysqli_error($conn));

$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '<table border="1" cellspacing="0" cellpadding="10px">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Hometown</th>
                    <th>Job</th>
                </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                      <td>{$row['id']}</td>
                      <td>{$row['FirstName']}</td>
                      <td>{$row['LastName']}</td>
                      <td>{$row['Age']}</td>
                      <td>{$row['Hometown']}</td>
                      <td>{$row['Job']}</td>
                    </tr>";
    }
    $output .= "</table>";
} else {
    $output = "<h2>No record found</h2>";
}

mysqli_close($conn);
echo $output;
?>

