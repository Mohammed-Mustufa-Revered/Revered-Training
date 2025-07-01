<?php

$servername = "localhost";
$username = "admin";
$password = "securepassword";
$dbname = "database_products";

// DB connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die("" . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];

    // Collect form inputs
    $pname = trim($_POST["p_name"]);
    $pskuname = trim($_POST["psku_name"]);
    $pcatearr = $_POST["p_categories"];
    $pcate = implode(",", $pcatearr);
    $pcrdate = $_POST["p_createddate"];
    $puddate = $_POST["p_updateddate"];
    $status = $_POST["p_status"];

    // ✅ Validation

    // Product Name: only letters, numbers, spaces
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $pname)) {
        $errors[] = "Product name must only contain letters, numbers, and spaces.";
    }

    // SKU: only letters and numbers, no special chars
    if (!preg_match("/^[a-zA-Z0-9]+$/", $pskuname)) {
        $errors[] = "Product SKU must only contain letters and numbers (no spaces or special characters).";
    }

    // File validation
    $file = $_FILES["p_manual"];
    if ($file["error"] !== 0) {
        $errors[] = "Error uploading the PDF file.";
    } elseif (mime_content_type($file["tmp_name"]) !== "application/pdf") {
        $errors[] = "Only PDF files are allowed.";
    } elseif ($file["size"] === 0) {
        $errors[] = "Uploaded file is empty.";
    }

    // Show validation errors if any
    if (!empty($errors)) {
        echo "<div style='color:red;'><strong>Validation Errors:</strong><ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul></div>";
        exit;
    }

    // Prepare file
    $manual_name = basename($file["name"]);
    $file_tmp = $file["tmp_name"];
    $file_content = addslashes(file_get_contents($file_tmp));

    //  Insert Query
    $q = "INSERT INTO products 
        (product_name, product_sku, product_categories, created_date, updated_date, manual_name, manual_content, p_status) 
        VALUES 
        ('$pname', '$pskuname', '$pcate', '$pcrdate', '$puddate', '$manual_name', '$file_content', '$status')";

    // Execute query
    try {
        $result = mysqli_query($conn, $q);
        if ($result) {
            echo "<p style='color:green;'>Data inserted successfully</p>";
        } else {
            echo "<p style='color:red;'>Database insert failed: " . mysqli_error($conn) . "</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color:red;'>Exception: " . $e->getMessage() . "</p>";
    }
}
?>
