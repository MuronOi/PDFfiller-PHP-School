<?php

    function getParam()
    {
        global $argv;
        $params = isset($argv[2])
              ? [$argv[1], $argv[2]]
              : [$argv[1], 'bot'];
        return $params;
    }       
    
    function checkingParams(array $params)
    {
        if (is_int(((int) $params[0])) && (int)$params[0] >= 1 && (is_string($params[1])
                && ($params[1] === 'bot' || $params[1] === 'top'))=== true) {
            return true;
        } else {
            exit('Input format is 4.2.php <side_length> <direction>'.PHP_EOL
                 .'The $n must be a natural unpaired number'. PHP_EOL
                 .'<direction> could be "bot" or "top". Default value is "bot"'.PHP_EOL);
        }
    } 

    function fillArray(int $l)
    {
        $snake = [];
        $upToDown = true;
        $c = 1;
        for ($i = 0; $i < $l; $i++) {
            if ($upToDown) {
                for ($j = 0; $j < $l; $j++) {
                    $snake [$i][$j] = $c;
                    $c++;
                }
                $upToDown = false;
            } else {
                for ($j = $l - 1; $j >= 0; $j--){
                    $snake [$i][$j] = $c;
                    $c++;
                }
                $upToDown = true;
            }
        }
        return $snake;
    }

    function printSnake(array $snake, int $l, string $option)
    {
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
    }

    $param = getParam();
    $l = $param[0];
    $option = $param[1];

    if (checkingParams($param) === true){
        $snake = fillArray($l);
        printSnake($snake, $l, $option);

    }

