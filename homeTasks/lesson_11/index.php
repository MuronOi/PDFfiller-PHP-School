<?php

require_once  __DIR__.'/vendor/autoload.php';

use App\Catalogue;
use App\Car;
use App\Truck;

$cars = [
    ['Opel', 1999, 'Astra', '3D7KS29D67G713596', 'Full'],
    ['ZAZ', 2015, 'Lanos', '1G4HJ5E18AU197987', 'Middle'],
    ['SEAT', 2010, 'Leon', 'JTEBU14R268056572', 'Small'],
];

$trucks = [
    ['Volvo', 2016, 'Volvo FH', '1GCHC23G73F112651', '166 t'],
    ['Scania', 2019, 'Scania R 440', 'JT2BG22KXV0610096', '150 t'],
    ['MAN', 2008, 'TGX', 'JT2BG22KXV0610096', '140 t'],
];

$catalog = new Catalogue();

foreach ($cars as $car){
    $catalog->addVehicle(new Car($car[0], $car[1], $car[2], $car[3], $car[4]));
}
foreach ($trucks as $truck){
    $catalog->addVehicle(new Truck($truck[0], $truck[1], $truck[2], $truck[3], $truck[4]));
}

for ($i = 0; $i < count($catalog->getCarList()); $i++) {
    var_export($catalog->getVehicle($i));
    echo PHP_EOL;
}



