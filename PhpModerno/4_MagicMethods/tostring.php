<?php


class Car{
    private string $name;
    private string $brand;
    private int $year;

    public function __construct(string $name, string $brand, int $year){
        $this->name = $name;
        $this->brand = $brand;
        $this->year = $year;
    }

    public function __toString(){
        return "El auto es " . $this->brand . " " . $this->name . " " . $this->year;
    }
}

$car = new Car("Mustang", "Ford", 2022);
$info = (string)$car;
echo $info;
echo $car;