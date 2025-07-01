<!DOCTYPE html>
<html>

<head>
    <title>Signup Form</title>
</head>

<body>
    <form method="POST">
        <h2>Signup</h2>
        <table>
            <tr>
                <td>Name: ></td>
                <td><input type="text" name="name" required><br><br></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" required><br><br></td>

            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" required><br><br></td>
            </tr>


            <tr>
                <td>
                    <input type="submit" value="Signup">
                </td>
            </tr>


        </table>
        <a href=login.php> Login page</a>
    </form>
</body>

</html>

<?php
session_start();
include "db.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];



    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";

    try {
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Signup Successfully. <a href='login.php'>Login here</a>";
        } else {
            echo "Signup failed: " . mysqli_error($conn);
        }
    } catch (mysqli_sql_exception $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>