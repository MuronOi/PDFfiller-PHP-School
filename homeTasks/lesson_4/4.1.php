<?php

    function getDiagonal()
    {
        global $argv;
        $shortOpt = 'd::';
        $longOpt = ['d::'];       
        
        $opt = getopt($shortOpt, $longOpt);
       
        $diagonal = isset($opt['d']) || isset($opt['d']) 
            ? reset($opt)
            : $argv[1];
              return $diagonal;        
    }       
    
    function checkingDiagonal($diagonal)
    {
        if (is_int($diagonal) && ($diagonal = 1)) {
            return TRUE;
        }  
 
        if (is_int((int) $diagonal) && ($diagonal >= 1) && (($diagonal % 2) === 1) ) {
            return TRUE;
        } else {
            exit('The diagonal must be natural unpaired number' . PHP_EOL);
          }             
    } 
        
    function printDimond($diagonal)
    {   
        $stars = $spaces = intdiv($diagonal, 2) + 1;
    
        for ($i = 1; $i <= $stars; $i++) {
            echo str_repeat(' ', $spaces);
            echo str_repeat('*', 2 * $i - 1);     
            echo PHP_EOL;  
            $spaces--;   
        } 
       
        $spaces = 2;
       
        for ($i =  1; $i < $stars; $i++) {
            echo str_repeat (' ', $spaces);
            echo str_repeat('*', 2 * ($stars - $i) - 1 );
            echo PHP_EOL;   
            $spaces++;
        } 
    }

    $diagonal = getDiagonal();
    if (checkingDiagonal($diagonal)) {
        printDimond($diagonal);
    }







