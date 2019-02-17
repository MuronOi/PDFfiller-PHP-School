<?php

require_once __DIR__.'/Stack.php';

function eyeOfSauron ($line) {
    if (strlen($line) % 2 != 0) {
        return false;
    }
    $pairs = [
        '[' => ']',
        '{' => '}',
        '(' => ')',
        '<' => '>'
    ];

    $line1 = new Stack();
    for ($i = 0; $i < strlen($line); $i++) {
        if (array_key_exists($line[$i], $pairs)) {
            $line1->in($pairs[$line[$i]]);
        }
    }

    $line2 = '';
    while (!$line1->isEmpty()){
        $line2 .= $line1->out();
    }

    if ($line2 === substr($line, (strlen($line) / 2))) {
        return true;
    } else {
        return false;
    }
}

var_dump(eyeOfSauron('(<{}>)'));