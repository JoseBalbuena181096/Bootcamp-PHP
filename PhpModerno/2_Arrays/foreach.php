<?php

$names = ["Juan", "Pedro", "Maria", "Luis"];
foreach ($names as $name) {
    echo $name . "<br>";
}

$person = [
    "name" => "Juan",
    "age" => 25,
    "city" => "Madrid"
];
foreach ($person as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
