<?php





try {
    $filename = "readme.txt";
    $add = "This is my new file";
    
    $fptr = fopen($filename, "a+");
    
    if (!$fptr) {
        die("Unable to open file for writing.");
    } else {
        $bytesWritten = fwrite($fptr, $add);
        $reading = fread($fptr, filesize($filename));
        
        if ($bytesWritten === false) {
            echo "Failed to write to file.";
        } else {
            echo "Successfully wrote $bytesWritten bytes to $filename.";
            echo "here is the file conteneyt : $reading";
        }

        fclose($fptr);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
// try {
//     $filename = "readme.txt";
//     $fptr = fopen($filename, "r");

//     if (!$fptr) {
//         die("Unable to load the file");
//     } else {
//         echo "Connection established<br>";

//         $content = fread($fptr, filesize($filename));
//         echo nl2br($content); // Converts newlines to HTML breaks for display

//         echo "<br>Hello";

//         fclose($fptr);
//     }
// } catch (Exception $e) {
//     echo $e->getMessage();
// }
// ?>


