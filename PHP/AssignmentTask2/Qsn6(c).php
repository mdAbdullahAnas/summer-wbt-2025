<?php
$char = 'A';

for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $char . " ";
    }
    echo "<br>";
    $char++;
}
?>
