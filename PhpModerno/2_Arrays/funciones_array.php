<?php
$beers = [
    "Corona",
    "Heineken",
    "Budweiser"
];

$beers2 = [
    "Corona 2",
    "Heineken 2",
    "Budweiser 2"
];

echo count($beers);
print_r($beers);
array_push($beers, "Budweiser");
echo count($beers);
print_r($beers);
$beer = array_pop($beers);
echo $beer;

if(in_array("Corona", $beers)) {
    echo "Corona is in the array";
} else {
    echo "Corona is not in the array";
}

array_merge($beers, $beers2);
echo count($beers);
echo print_r($beers);
