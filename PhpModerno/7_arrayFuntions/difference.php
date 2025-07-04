<?php

require "modelsArray/functions.php";
require "modelsArray/people.php";

use ModelsArray\People;

$people = [
    new People("John", 30),
    new People("Jane", 25),
    new People("Bob", 35),
    new People("Luis", 30),
    new People("Maria", 25),
    new People("Pedro", 35),
];

$people2 = [
    new People("Luis", 30),
    new People("Maria", 25),
    new People("Pedro", 35),
];


// echo ("John"<=>"Jane")."<br>";
// echo ("Jane"<=>"John")."<br>";
// echo ("John"<=>"John")."<br>";

$differece = array_diff($people, $people2, 
    fn($person1, $person2) => 
    $person1->name <=> $person2->name);
show($differece);
