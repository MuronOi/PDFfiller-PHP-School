<?php

require_once __DIR__.'/HashTable.php';
require_once __DIR__.'/CollisionResolvers/CollisionResolverPlus1.php';
require_once __DIR__.'/CollisionResolvers/CollisionResolverInterface.php';
require_once __DIR__.'/HashFunction.php';

$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new ResolveCollisionsPlus1());

$string = ['Jim', 'Ted', 'Mia', 'Sam', 'Ted', 'Lou', 'dTe'];

for ($i = 0; $i < count($string); $i ++){
    $hashFunction = new HashFunction($string[$i], $hashTableLength);
    $hashTable->write($hashFunction(), $string[$i]);
}
//$hashFunction = new HashFunction($string, $hashTableLength);
//
//$hashTable->write($hashFunction(), '12csdc3');
//$hashFunction = new HashFunction('asd1', $hashTableLength);
//$hashTable->write($hashFunction->__invoke(), "asd1");
//$hashFunction = new HashFunction('asd1', $hashTableLength);
//$hashTable->write($hashFunction->__invoke(), "asd1");
////$hashTable->write($hashFunction->__invoke(), "aAd");
//

$getString = 'dTe';
$hashFunction = new HashFunction($getString, $hashTableLength);
echo $hashTable->get($hashFunction->__invoke(), 'dTe'), 'PPPPPPPPPPPPPPP', PHP_EOL;


var_export($hashTable);
