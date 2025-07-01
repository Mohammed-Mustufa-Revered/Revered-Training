<?php
// Include the questions file
include 'questions.php';

// Initialize variables to track results
$correct_answers = 0;
$attempted_questions = 0;
$wrong_answers = 0;

// Process each question's answer
foreach ($questions as $index => $question) {
    if (isset($_POST["q$index"])) {
        $selected_answer = $_POST["q$index"];
        $attempted_questions++;

        // Check if the answer is correct
        if ($selected_answer == $question['correct_answer']) {
            $correct_answers++;
        } else {
            $wrong_answers++;
        }
    }
}

// Display the results
echo "<h1>Quiz Results</h1>";
echo "<p>Total Questions: " . count($questions) . "</p>";
echo "<p>Attempted Questions: $attempted_questions</p>";
echo "<p>Correct Answers: $correct_answers</p>";
echo "<p>Wrong Answers: $wrong_answers</p>";
?>
