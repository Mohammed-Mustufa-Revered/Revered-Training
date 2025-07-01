<?php
// Include the questions file
include 'questions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
</head>
<body>
    <h1>OOPS Quiz</h1>
    <form action="submit.php" method="POST">
        <?php
        $question_number = 1;
        foreach ($questions as $index => $question) {
            echo "<p>" . $question_number . ". " . $question['question'] . "</p>";
            foreach ($question['options'] as $key => $option) {
                echo "<input type='radio' name='q$index' value='" . chr(97 + $key) . "'> $option<br>";
            }
            $question_number++;
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>