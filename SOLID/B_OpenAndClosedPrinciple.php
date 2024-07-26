<?php 

/*

* A class should be open for extension but closed for modification

* Separate the extensible behaviour behind and interface and flip the dependencies.

*/


interface Shape{

    public function area();
}

class Square implements Shape {


    public $height;
    
    public $width;

    /**
     * Class constructor.
     */
    public function __construct($height, $width)
    {
        $this->height = $height;

        $this->width = $width; 
    }

    public function area(){
    
        return $this->height * $this->width;
    }
}

class Circle implements Shape {


    public $radius;
    
    /**
     * Class constructor.
     */
    public function __construct($radius)
    {
        $this->radius = $radius; 
    }

    public function area(){
    
        return 2 * $this->radius * pi();
    }
}


class AreaCalculator {

    public function calculate($shapes){
    
        foreach ($shapes as $shape) {

            $area[] = $shape->area();
            //Coding to an interface ensures to have an area method
        }

        return array_sum($area);
    }
}
