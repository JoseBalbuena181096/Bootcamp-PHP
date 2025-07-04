<?php

require "modelsArray/functions.php";
require "modelsArray/people.php";

use ModelsArray\People;

$people = [
    new People("John", 30),
    new People("Jane", 25),
    new People("Bob", 35),
];

$sum = array_reduce($people, 
    fn($current, $person) => $current + $person->age, 0);

//show($sum);

$namesPipe = array_reduce(
    $people,
    fn($current, $person) => $current . " " . $person->name . "|",
    ""
);


$contentHTML = array_reduce(
    $people,
    fn($current, $person) => $current . "<li>" . $person->name . "</li>",
    "<ul>"
);
$contentHTML .= "</ul>";
show($contentHTML);