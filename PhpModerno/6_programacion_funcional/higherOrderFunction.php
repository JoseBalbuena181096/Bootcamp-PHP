<?php

// Una funcion de orden superior es aquella que recibe una funcion como parametro

$some = function (float $a, float $b): float{
    return $a + $b;
};

// function showResult($fn, float $a, float $b): void{
//     echo $fn($a, $b);
// }

function showResult(callable $fn, float $a, float $b): void{
    echo $fn($a, $b);
}

function multiply(float $a, float $b): float{
    return $a * $b;
}

showResult($some, 10, 2);
showResult("multiply", 10, 2);

