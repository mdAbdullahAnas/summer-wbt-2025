<?php
echo "Prime numbers between 1 and 50 are here: <br>";

for ($num = 2; $num <= 50; $num++) {
    $isPrime = true;

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo $num . " ";
    }
}
?>
