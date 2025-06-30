<?php

$beers = [
    ["name" => "Corona", "price" => 2,"city" => "Madrid"],
    ["name" => "Heineken", "price" => 3,"city" => "Barcelona"],
    ["name" => "Budweiser", "price" => 4,"city" => "Valencia"]
];

echo $beers[0]["name"];

echo $beers[1]["price"];

echo $beers[2]["city"];

foreach ($beers as $beer) {
    echo $beer["name"] . " - " . $beer["price"] . " - " . $beer["city"] . "<br>";
}
