<?php

    function getMoney()
    {
        $moneyAmount = -1;        
        
        echo 'Plese enter the amount of currecy. Maximum - 100 000 UAH:', PHP_EOL;
        fscanf(STDIN, "%d\n", $moneyAmount);
       
        while ((is_int($moneyAmount) && ($moneyAmount >= 1) && ($moneyAmount <= 100000)) == false )
        { 
            echo 'Please enter a correct amount:' , PHP_EOL;
            fscanf(STDIN, "%d\n", $moneyAmount); 
         }

        return $moneyAmount;
    }

    function exchange($amount) 
    { 
        $noteValues = array(500, 200, 100, 50, 20, 10, 5, 2, 1); 
        $noteAmount = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0); 
      
        for ($i = 0; $i < 9; $i++)  
        { 
            if ($amount >= $noteValues[$i]) 
            { 
                $noteAmount[$i] = intval($amount / $noteValues[$i]); 
                $amount = $amount - $noteAmount[$i] * $noteValues[$i]; 
            } 
        }      
    
        echo ("You must receive ->"."\n"); 
        for ($i = 0; $i < 9; $i++)  
        { 
            if ($noteAmount[$i] != 0)  
            { 
                echo ($noteValues[$i] . " : " . $noteAmount[$i] . "\n"); 
            }
        }
     }

     exchange(getMoney());
