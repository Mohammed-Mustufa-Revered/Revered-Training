<!DOCTYPE html>
<html>
<body>

<form method="post">
  Enter an integer: <input type="number" name="num">
  <input type="submit">
</form>

<?php
class Table {
    public function show($n) {
        echo "<h3>Multiplication Table of $n</h3>";
        for ($i = 1; $i <= 10; $i++) {
            echo "$n x $i = " . ($n * $i) . "<br>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num"])) {
    $table = new Table();
    $table->show((int)$_POST["num"]);
}
?>

</body>
</html>
