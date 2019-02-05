<?php

    function getParam()
    {
        global $argv;
             
        
       
        //$params = $argv[1], $argv[2];//isset($argv[2])  
          //  ? $argv[1], $argv[2]
            //: $argv[1];
            //  return $params;        
    }       
    
    function checkingParams($params)
    {
                  
    } 
        
    $param = getParam();
    var_export ($param);
    
    $l = 3;     
    $snake = [];

    $goDown = true;
    $c = 1;
    for ($i = 0; $i < $l; $i++) {
        if ($goDown) {
            for ($j = 0; $j < $l; $j++) {
                $snake [$i][$j] = $c;
                $c++;
            }
            $goDown = false;
        } else {
              for ($j = $l - 1; $j >= 0; $j--){
                  $snake [$i][$j] = $c;
                  $c++;
              }
              $goDown = true;  
          }
          
    }
    $option = 'bot';
    for ($i = 0; $i < $l; $i++) {
         for ($j = 0; $j < $l; $j++) {
                if ($option === 'bot') { 
                    echo $snake[$j][$i], ' ';
                } else {
                      echo $snake[$i][$j], ' ';
                  }
         }
         echo PHP_EOL;
    }

   // print_r($snake);
      
    //var_export ($snake);


