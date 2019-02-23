<?php

function fibonachiLoop($value){
    $fr = $sc = 1;

    for ($i = 2; $i <= $value; $i++){
        $sc += $fr;
        $fr = $sc - $fr;
    }
    return $sc;

}

echo fibonachiLoop(10), PHP_EOL;
