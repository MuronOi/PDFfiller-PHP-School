<?php

function srt($string){
    $subStr = $string[0];
    $count = strlen($string);
    $j = 0;

     for ($i = 0; $i < $count; $i++){
   //     for ($j = 1; $j < strlen($string); ){
            if (substr($string, $subStr, $i) == )
            if (!in_array($string[$i], $subStr)) {

                $subStr[$i] .= $string[$i];
                array_push($subStr, $string[$i]);

            }
     //   }

    }
    return $subStr;

}

var_export(srt('hjkjhjgt'));