<?php

namespace ModelsArray;

class People{
    public $name;
    public $age;

    public function __construct(string $name, int $age){
        $this->name = $name;
        $this->age = $age;
    }
    public function __toString(){
        return $this->name . " " . $this->age;
    }
}
