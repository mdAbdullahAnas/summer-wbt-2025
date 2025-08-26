<?php
$a = 15;
$b = 22;
$c = 10;

if ($a >= $b && $a >= $c) {
    echo "Largest number is: $a";
} elseif ($b >= $a && $b >= $c) {
    echo "Largest number is: $b";
} else {
    echo "Largest number is: $c";
}
?>
