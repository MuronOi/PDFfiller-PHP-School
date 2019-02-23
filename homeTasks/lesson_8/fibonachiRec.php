<?php

$x = [0,1,2,3,4,5,6, 7, 8];
$y = [1,1,2,3,5,8,13,21,34];

function fibonachi_rec($value){
    if ($value < 2) {
            return 1;
        }
        else {
            return fibonachi_rec($value - 1) + fibonachi_rec($value - 2);
        }


}



echo fibonachi_rec(4);