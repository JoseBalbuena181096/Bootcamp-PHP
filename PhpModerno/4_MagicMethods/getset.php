<?php

class Person{
    public int $id;
    public string $name;
    public array $data = [];

    public function __construct(int $id, string $name){
        $this->id = $id;
        $this->name = $name;
    }

    public function __get($name){
        return $this->data[$name];
    }
    public function __set($name, $value){
        $this->data[$name] = $value;
    }

}

$person = new Person(1, "John");
echo $person->id;
echo $person->name;
$person->address = "123 Main St";
echo $person->address;



