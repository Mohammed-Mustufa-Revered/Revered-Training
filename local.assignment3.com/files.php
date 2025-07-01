<?php
$fptr = fopen("readme.txt","r");
if (!$fptr) {
    die("unable to load the file ");
}
$content = fread($fread,3);
echo $content;
?>