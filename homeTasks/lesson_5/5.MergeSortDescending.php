<?php


$A = [1, 8, -5, 33, 10, 5, 20, 19, -21];

function merge (&$A, $p, $q, $r)
{
    $n1 = $q - $p + 1;
    $n2 = $r - $q;

    $L = $R = [];

    for($i = 0; $i < $n1; $i++){
        $L[$i] = $A[$p + $i];
    }

    for($j = 0; $j < $n2; $j++){
        $R[$j] = $A[$q + $j + 1];
    }

    $L[$n1] = $R[$n2] = PHP_INT_MIN;
    $i = $j = 0;

    for($k = $p; $k <= $r; $k++){
        if ($L[$i] > $R[$j]) {
            $A[$k] = $L[$i];
            $i++;
        } else {
            $A[$k] = $R[$j];
            $j++;
        }
    }
}

function mergeSort(&$A, $p, $r)
{
    if ($p < $r) {
        $q = floor (($p + $r) / 2);
        mergeSort($A, $p, $q);
        mergeSort($A, $q + 1, $r);
        merge($A, $p, $q, $r);
    }
}

mergeSort($A, 0, count($A) - 1);
echo json_encode($A).PHP_EOL;
