<?php
    $N = 5;
    for($i = 0; $i < $N; $i++) 
    { 
        for($j = 1; $j < $N - $i; $j++) 
        {
            echo "&nbsp;&nbsp;";
        }
        for($k = 0; $k <= $i; $k++) 
        {
            echo "#";
        }
        echo "<br>";
    }
?>