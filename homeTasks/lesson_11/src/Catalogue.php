<?php

class Catalogue
{
    private $carList = [];

    /**
     * @param Vehicle $vehicle
     */
    public function addVehicle(Vehicle $vehicle): void
    {
        $this->carList[] = $vehicle;
    }

    /**
     * @param int $index
     * @return Vehicle
     */
    public function getVehicle(int $index): Vehicle
    {
        if ($index < count($this->carList) && $index >= 0) {
            return $this->carList[$index];
        }
    }

    /**
     * @return array
     */
    public function getCarList(): array
    {
        return $this->carList;
    }


}
