<html><?php 
// $servername = "localhost";
// $username = "admin";
// $password = "securepassword";
// $dbname = "database_products";
// try {
//     $conn = new mysqli($servername, $username, $password, $dbname);
// } catch (Exception $e) {
//     die("" . $e->getMessage());
// }
// // Pagination Logic
//  $limit = 3;
// $page = $_GET['page'];
// if(isset($_GET['page'])){
//     $page = $_GET['page'];
// }
// else{
//     $page = 1;
// }
// $offset = ($page -1) * $limit;  


// $sql = "SELECT * FROM products LIMIT $offset,$limit" ;
// $result = mysqli_query($conn,$sql) or die("Query Failed". mysqli_error($conn));
// echo "<h2>Product List</h2>";
//     echo "<table border='1' cellpadding='8' cellspacing='0'>";
//     echo "<tr>
//             <th>Product Name</th>
//             <th>SKU</th>
//             <th>Categories</th>
//             <th>Created Date</th>
//             <th>Updated Date</th>
//             <th>Status</th>
//             <th>Manual (PDF)</th>
//         </tr>";
//     echo "<tr>";
     
// while ($row = mysqli_fetch_array($result)) {

//     $file = base64_encode($row["manual_content"]);
//      echo "<tr>";
//         echo "<td>" . $row["product_name"] . "</td>";
//         echo "<td>" . $row["product_sku"] . "</td>";
//         echo "<td>" . $row["product_categories"] . "</td>";
//         echo "<td>" . $row["created_date"] . "</td>";
//         echo "<td>" . $row["updated_date"] . "</td>";
//         echo "<td>" . $row["p_status"] . "</td>";
//         echo "<td><embed src='data:application/pdf;base64," . $file . "' type='application/pdf' width='100' height='100'></td>";
//         echo "</tr>";


// }

// echo "</table>";
 

//    // Total Pages for pagination
//     $sql1 ="SELECT * FROM products";
//     $result1 = mysqli_query($conn,$sql1) or die("Query failed". mysqli_error($conn));
//     if(mysqli_num_rows($result1) >0)  {
//         $total_rec = mysqli_num_rows($result1);
       
//         $total_page = ceil( $total_rec / $limit );
//        echo '<ul class = "pagination admin-pagination">'; 
//        echo "pages : ";
//        // implemented pagination links
//        for($i=1;$i<=$total_page;$i++){
//        echo '<a href = "show_data.php?page= '.$i.'">   '.$i.'</a>';
//         }
//         echo '</ul'; 
    
//     }






 
$servername = "localhost";
$username = "admin";
$password = "securepassword";
$dbname = "database_products";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set limit and page number
$limit = 3;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query with LIMIT and OFFSET
$sql = "SELECT * FROM products LIMIT $offset, $limit";
$result = $conn->query($sql);

// Start output
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

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $file = base64_encode($row["manual_content"]);
        echo "<tr>";
        echo "<td>{$row['product_name']}</td>";
        echo "<td>{$row['product_sku']}</td>";
        echo "<td>{$row['product_categories']}</td>";
        echo "<td>{$row['created_date']}</td>";
        echo "<td>{$row['updated_date']}</td>";
        echo "<td>{$row['p_status']}</td>";
        echo "<td><embed src='data:application/pdf;base64,{$file}' type='application/pdf' width='100' height='100'></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No products found.</td></tr>";
}
echo "</table>";

// Pagination links
$sqlTotal = "SELECT COUNT(*) as total FROM products";
$resultTotal = $conn->query($sqlTotal);
$totalRow = $resultTotal->fetch_assoc();
$total_records = $totalRow['total'];
$total_pages = ceil($total_records / $limit);

echo '<div class="pagination admin-pagination">';
echo "Pages: ";
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<a href="#" class="page-link" data-page="' . $i . '" style="margin-right:10px;">' . $i . '</a>';
}
echo '</div>';


?>
</html>
