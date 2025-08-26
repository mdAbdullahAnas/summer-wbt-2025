<?php
$ch = 65; // ASCII for 'A'
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr($ch) . " ";
        $ch++;
    }
    echo "<br>";
}
?>
