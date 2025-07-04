<?php

require "modelsArray/functions.php";
require "modelsArray/people.php";

use ModelsArray\People;

$people = [
    new People("John", 30),
    new People("Jane", 25),
    new People("Bob", 35),
];

// echo (1<=>2)."<br>";
// echo (2<=>1)."<br>";
// echo (2<=>2)."<br>";

// esta si modifica el array original
usort($people, fn($personA, $personB) => $personA->age <=> $personB->age);
show($people);


usort($people, fn($personA, $personB) => $personB->age <=> $personA->age);
show($people);