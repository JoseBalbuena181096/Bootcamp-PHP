<?php

require "modelsArray/functions.php";
require "modelsArray/people.php";

use ModelsArray\People;

$people = [
    new People("John", 30),
    new People("Jane", 25),
    new People("Bob", 35),
];

// Map funtion to extract names from people objects
// Map function returns a new array
$names = array_map(fn($person) => 
    $person->name, $people);

$nameWithFormat = array_map(fn($person) =>   
    "<b style='color: red'>".$person->name . "</b>", $people);

// show($nameWithFormat);

$nameWithNumber= array_map(fn($person, $index)
    => $index+1 . " <-> " . $person->name ,
    $people, array_keys($people));

// show($nameWithNumber);

$nameWithNumber2= array_map(fn($person, $index)
    => ["id"=> $index+1, "name" => $person->name ] ,
    $people, array_keys($people));

show($nameWithNumber2);
echo $nameWithNumber2[0]["name"];
