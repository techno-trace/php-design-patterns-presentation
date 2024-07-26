<?php

/* 
A decorator allows us to dynamically extend the behavior of a particular object at runtime, without needing to resort to unnecessary inheritance. Let me give you a demonstration.

*/

interface CarService
{
    public function getCost();

    public function getDescription();
}

class BasicInspection implements CarService
{
    public function getDescription()
    {
        return "Basic Inspection";
    }

    public function getCost()
    {
        return 15;
    }
}
/*
class BasicInspectionAndOilChange {
    public function getCost(){

        return 20 + 19;
    }
}
class BasicInspectionAndOilChangeAndTireRotation {
    public function getCost(){

        return 20 + 19 + 10;
    }
}


echo (new BasicInspectionAndOilChangeAndTireRotation())->getCost();
 */

 
class OilChange implements CarService
{
    protected $carservice;

    /**
     * Class constructor.
     */
    public function __construct(CarService $carservice)
    {
        $this->carservice = $carservice;
    }

    public function getDescription()
    {
        return $this->carservice->getDescription() . ", and an oil change";
    }

    public function getCost()
    {
        return 19 + $this->carservice->getCost();
    }
}


 class TireRotation implements CarService
 {
     protected $carservice;

     /**
      * Class constructor.
      */
     public function __construct(CarService $carservice)
     {
         $this->carservice = $carservice;
     }

     public function getDescription()
     {
         return $this->carservice->getDescription() . ", and a tire rotation";
     }

     public function getCost()
     {
         return 10 + $this->carservice->getCost();
     }
 }

/*

The Problem with this approach is that it breaks the OpenClosed Principle

 class BasicInspection
 {
     protected $cost = 25;

     public function getDescription()
     {
         return "Basic Inspection";
     }

     public function getCost()
     {
         return $this->cost;
     }

     protected function withOilChange()
     {
         return $this->cost + 19;
     }
     protected function withTireRotation()
     {
         return $this->cost + 10;
     }
 }

 */

echo (new TireRotation(new OilChange(new BasicInspection())))->getDescription();
