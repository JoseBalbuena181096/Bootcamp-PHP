<?php

require "modelsArray/functions.php";
require "modelsArray/people.php";

use ModelsArray\People;

$people = [
    new People("John", 30),
    new People("Jane", 25),
    new People("Bob", 35),
];

// Filter function returns a new array of people older than 25
$greater25years = array_filter($people, 
    fn($person) => $person->age > 25);

//show($greater25years);

$withoutPedro = array_filter($people,
   fn($person) => $person->name !== "John"
);

show($withoutPedro);