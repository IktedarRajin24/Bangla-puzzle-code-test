<?php

$a = 10; $b = 5;
echo "Before Exchanging: a = ",$a, ", ", "b = ", $b;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b; 
echo "<br>";
echo "After Exchanging: a = ",$a, ", ", "b = ", $b;
?>