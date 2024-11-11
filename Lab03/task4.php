<?php
    $a = 3;
    $b = 7;
    $c = 5;

    if ($a > $b && $a > $c) {
        echo "The Largest Number is: $a\n";
    } elseif ($b > $a && $b > $c) {
        echo "The Largest Number is: $b\n";
    } else {
        echo "The Largest Number is: $c\n";
    }
?>
