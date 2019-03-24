<?php

namespace App;
class Vehicle
{
    private $carBrande;
    private $productionYear;
    private $carModel;
    private $VIN;

    /**
     * Vehicle constructor.
     * @param $carBrande
     * @param $productionYear
     * @param $carModel
     * @param $VIN
     */
    public function __construct($carBrande, $productionYear, $carModel, $VIN)
    {
        $this->setCarBrande($carBrande);
        $this->setProductionYear($productionYear);
        $this->setCarModel($carModel);
        $this->setVIN($VIN);
    }

    /**
     * @return mixed
     */
    public function getCarBrande()
    {
        return $this->carBrande;
    }

    /**
     * @param mixed $carBrande
     */
    public function setCarBrande($carBrande): void
    {
        $this->carBrande = $carBrande;
    }

    /**
     * @return mixed
     */
    public function getProductionYear()
    {
        return $this->productionYear;
    }

    /**
     * @param mixed $productionYear
     */
    public function setProductionYear(int $productionYear): void
    {
        $this->productionYear = $productionYear;
    }

    /**
     * @return mixed
     */
    public function getCarModel()
    {
        return $this->carModel;
    }

    /**
     * @param mixed $carModel
     */
    public function setCarModel($carModel): void
    {
        $this->carModel = $carModel;
    }

    /**
     * @return mixed
     */
    public function getVIN()
    {
        return $this->VIN;
    }

    /**
     * @param mixed $VIN
     */
    public function setVIN($VIN): void
    {
        $this->VIN = $VIN;
    }

}