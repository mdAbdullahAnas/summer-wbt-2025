<?php
$numbers = array(5, 10, 15, 20, 25);
$search = 15;
$found = false;

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] == $search) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "$search found in array.";
} else {
    echo "$search not found in array.";
}
?>
