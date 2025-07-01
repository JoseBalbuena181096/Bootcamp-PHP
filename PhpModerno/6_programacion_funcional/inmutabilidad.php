

<?php

/**
La capacidad que tienen ciertos objetos
para no ser modificados en su estado
**/
class Location{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y){
        $this->x = $x;
        $this->y = $y;
    }

    // getter 
    public function getX(): float{
        return $this->x;
    }

    // getter 
    public function getY(): float{
        return $this->y;
    }   

    public function move(float $x, float $y): Location{
        return new Location($this->x + $x, $this->y + $y);
    }
}

$location = new Location(1, 2);
echo $location->getX();

$location = $location->move(2, 2);
echo $location->getX();

