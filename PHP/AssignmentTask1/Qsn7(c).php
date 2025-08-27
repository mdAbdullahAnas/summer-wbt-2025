<?php
$ch = 65;  
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr($ch) . " ";
        $ch++;
    }
    echo "<br>";
}
?>
