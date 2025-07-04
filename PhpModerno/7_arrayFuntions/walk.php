<?php

require "modelsArray/functions.php";

$numbers = [1, 2, 3, 4, 5];

// $numberX2 = array_map(fn($number) => $number * 2, $numbers);

array_walk($numbers, fn(&$num) => $num *=2 );
//show($numbers);

array_walk($numbers, fn(&$num) => $num +=6 );
show($numbers);

array_walk($numbers, function($num) { echo $num."<br>"; });
