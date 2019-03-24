<?php

require_once __DIR__.'/HashTable.php';
require_once __DIR__.'/CollisionResolvers/CollisionResolverLinkedList.php';
require_once __DIR__.'/HashFunction.php';

$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new CollisionResolverLinkedList());

$string = ['Jim', 'Ted', 'Mia', 'Sam', 'Ted', 'Lou', 'dTe', 'Sma', '5', '5'];

for ($i = 0; $i < count($string); $i ++){
    $hashFunction = new HashFunction($string[$i], $hashTableLength);
    $hashTable->write($hashFunction(), $string[$i]);
}


//$getString = 'dTe';
//$hashFunction = new HashFunction($getString, $hashTableLength);
//echo $hashTable->get($hashFunction->__invoke(), 'dTe'), 'PPPPPPPPPPPPPPP', PHP_EOL;


var_export($hashTable);
