<?php

namespace App;

class Car extends Vehicle
{
    private $carBuild;

    /**
     * Car constructor.
     * @param $carBrande
     * @param $productionYear
     * @param $carModel
     * @param $VIN
     * @param $carBuild
     */
    public function __construct($carBrande, $productionYear, $carModel, $VIN, $carBuild)
    {
        parent::__construct($carBrande, $productionYear, $carModel, $VIN);
        $this->setCarBuild($carBuild);
    }

    /**
     * @return mixed
     */
    public function getCarBuild()
    {
        return $this->carBuild;
    }

    /**
     * @param mixed $carBuild
     */
    public function setCarBuild($carBuild): void
    {
        $this->carBuild = $carBuild;
    }


}