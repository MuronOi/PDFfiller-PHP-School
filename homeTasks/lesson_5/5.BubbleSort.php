<?php

function bubbleSort(array $a)
{
    $length = count($a);
    for ($i = 0; $i < $length; $i++) {
        for ($j = $length-1; $j >= $i+1; $j--){
            if ($a[$j] < $a[$j-1]) {
                $t = $a[$j];
                $a[$j] = $a[$j-1];
                $a[$j-1] = $t;
            }
        }
    }
    return $a;
}

$s = [1, 123, 3, 6, 2, 323, 66, 13,];

echo json_encode(bubbleSort($s)), PHP_EOL;
