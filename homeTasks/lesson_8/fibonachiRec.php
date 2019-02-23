<?php

$x = [0,1,2,3,4,5,6, 7, 8];
$y = [1,1,2,3,5,8,13,21,34];

function fibonachiRec($value){
    if ($value < 2) {
            return 1;
        }
        else {
            return fibonachiRec($value - 1) + fibonachiRec($value - 2);
        }


}



echo fibonachiRec(4);