<?php

require_once __DIR__.'/LinkedList.php';

$obj = new LinkedList();
$obj->append(2);
$obj->append(3);
$obj->append(4);
$obj->append(5);
$obj->append(6);
$obj->append(7);

echo $obj->__toString(), PHP_EOL;
$obj->insertAfterAt('26', 3);
echo $obj->__toString(), PHP_EOL;

$obj->deleteFromEnd();
echo $obj->__toString(), PHP_EOL;

$obj->deleteFromHead();
echo $obj->__toString(), PHP_EOL;

$obj->deleteAt(4);
echo $obj->__toString(), PHP_EOL;