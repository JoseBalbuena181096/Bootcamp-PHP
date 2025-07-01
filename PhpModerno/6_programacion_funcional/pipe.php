<?php

// pipe es una funcion que recibe una funcion y devuelve una funcion

// destructuracion de elementos de funcion

function showNames(...$names){
    foreach($names as $name){
        echo $name . "\n";
    }
}

// showNames("Juan", "Pedro", "Maria", "Luis", "Ana");

function pipe(...$funcs){
    return function($value) use ($funcs){
        foreach($funcs as $fun){
            $value = $fun($value);
        }
        return $value;
    };
}

$toUpper = fn($s) => strtoupper($s);
$toLower = fn($s) => str_replace(" ", "", $s);
$toCapitalize = fn($s) => preg_replace('/\d+/u', '', $s);


$myPipe = pipe($toUpper, $toLower, $toCapitalize);
//pipe es una funcion que recibe una funcion y devuelve una funcion

echo $myPipe("Juan 123  6r56fghvgh");