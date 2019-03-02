<?php

$arr = [2, 7, 13, 8, 1, 4];
$value = 9;

function myFunc ($arr, $value){
    //$arr1 = $arr;
    //sort($arr1);

    //*var_export($arr1);
    $result = [];
    $i = 0;
    $j = 1;
    for ($i = 0; $i < count($arr); $i++){
        for ($j = 1; $j < count($arr); $j++){
            if ($arr[$i] + $arr[$j] == $value){
                array_push($result, [$i, $j]);
                echo $arr[$i], ' ' , $arr[$j], PHP_EOL;
//               $i++;
               // $j++;
            }

            $j++;
        }
        $i++;

    }
    return $result;
}

var_export(myFunc($arr, $value));