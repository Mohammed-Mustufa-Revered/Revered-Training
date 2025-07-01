<?php
$servername = "localhost";
$username = "admin";
$password = "securepassword";
$dbname = "database_products";
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die("" . $e->getMessage());
}
try {
$sql = "SELECT * FROM products";
$result = mysqli_query($conn,$sql);
echo "<h2>Product List</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>Product Name</th>
            <th>SKU</th>
            <th>Categories</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Status</th>
            <th>Manual (PDF)</th>
        </tr>";
while ($row = mysqli_fetch_array($result)) {

    $fil = base64_encode($row["manual_content"]);
    echo "<tr>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["product_sku"] . "</td>";
        echo "<td>" . $row["product_categories"] . "</td>";
        echo "<td>" . $row["created_date"] . "</td>";
        echo "<td>" . $row["updated_date"] . "</td>";
        echo "<td>" . $row["p_status"] . "</td>";
        echo "<td><embed src='data:application/pdf;base64," . $fil . "' type='application/pdf' width='100' height='100'></td>";
        echo "</tr>";


}
} catch (Exception $e) {    
    die("". $e->getMessage());
}
?>
