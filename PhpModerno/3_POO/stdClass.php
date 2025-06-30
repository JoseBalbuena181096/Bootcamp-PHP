<?php

$beer = new stdClass();
$beer->name = "Corona";
$beer->price = 10;
$beer->stock = 10;


$arr = (array)$beer;
print_r($arr);

echo $arr['name'];

$arrBeer = [
    "address" => "Rua 123",
    "country" => "Brasil"
];


$objBeer = (object)$arrBeer;
print_r($objBeer);