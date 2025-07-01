<?php

echo "today  ".date(("d/m/y"));
echo "<br>";
echo "current Time". date(("h:i:sa"));
echo "<br>";
$d = mktime(12,45,3012,24,2025);
echo "". date(("h:i:sa m/d/y"),$d);    
echo "<br>";
echo "String";
?> 