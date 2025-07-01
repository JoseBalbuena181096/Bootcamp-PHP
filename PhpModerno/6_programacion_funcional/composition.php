<?php

// la composicion es la union de dos funciones
// una funcion que se compone de varias funciones
// dos o mas

function composition($func1, $func2){
    return function($value) use ($func1, $func2){
        return $func1($func2($value));
    };
}

$add10 = fn($x) => $x + 10;
$mul20 = fn($x) => $x * 20;

$composition = composition($add10, $mul20);
echo $composition(5);