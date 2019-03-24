<?php


function maxLen($string){
    $return = 0;
    $substring = '';

    for ($i = 0; $i < strlen($string); $i++)
    {
        $pos = strpos($substring, $string[$i]);
        if ($pos !== FALSE)
        {
            $count = strlen($substring);
            $return = $count > $return ? $count : $return;
            $substring = substr($substring, $pos + 1).$string[$i];
        }
        else
        {
            $substring .= $string[$i];

            if ($i == strlen($string) - 1)
            {
                $count = strlen($substring);
                $return = $count > $return ? $count : $return;
            }
        }
    }

    return $return;
}

echo maxLen('yyuuufhvksooooo');