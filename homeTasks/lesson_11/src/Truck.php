<?php
namespace App;
require_once __DIR__.'/Vehicle.php';

//use App\Vehicle;
class Truck extends Vehicle
{
    private $carryingCapacity;

    /**
     * Truck constructor.
     * @param $carBrande
     * @param $productionYear
     * @param $carModel
     * @param $VIN
     * @param $carryingCapacity
     */
    public function __construct($carBrande, $productionYear, $carModel, $VIN, $carryingCapacity)
    {
        parent::__construct($carBrande, $productionYear, $carModel, $VIN);
        $this->setCarryingCapacity($carryingCapacity);
    }

    /**
     * @return mixed
     */
    public function getCarryingCapacity()
    {
        return $this->carryingCapacity;
    }

    /**
     * @param mixed $carryingCapacity
     */
    public function setCarryingCapacity($carryingCapacity): void
    {
        $this->carryingCapacity = $carryingCapacity;
    }

}