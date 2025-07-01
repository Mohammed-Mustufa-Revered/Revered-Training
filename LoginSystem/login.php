<?php
session_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
       

        if ($pass == $user['password']) {
            $_SESSION['USER_ID'] = $user['id'];
            $_SESSION['USERNAME'] = $user['name'];
            header("Location: welcome.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    <table>
        <tr>
            <td>   Email   :</td>
            <td><input type="email" name="email" required><br><br></td>

        </tr>
        <tr>

            <td>Password:</td>
            <td><input type="password" name="pass" required><br><br></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Login">
            </td>
        </tr>

    </table>
 


</form>