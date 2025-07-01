<?php 
$fptr = fopen("readme.txt","r");
if (!$fptr) {
    die("unable to load the file ");
}
$content = fread($ftpr,3);
echo $content;
echo "Hello ";
?>