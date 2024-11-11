<?php
    $array = [10, 20, 30, 50, 90, 100];
    $element = 20;

    $index = array_search($element, $array);

    if ($index !== false) {
        echo "$element found in the array at index $index\n";
    } else {
        echo "$element not found in the array\n";
    }
?>
