<?php

// un clousure es una funcion que se puede asignar a una variable 

// un closure en programacion general es una funcio de orden superior 
// que retorna una 
// una funcion  que retorna otra funcion pero mantiene 
// el scope de la funcion padre

// en php 
// un closure es una clase que instancia funciones anónimas


function add(float $number){
    return function(float $number2) use ($number){
        return $number + $number2;
    };
}



$add5 = add(5);
$add30 = add(30);
echo $add5(14)."\n";
echo $add5(33)."\n";
echo $add30(14)."\n";
echo $add30(33)."\n";


function hi(){
    $count = 0;
    // para modificar el valor lo pasamos por referencia
    return function() use (&$count){
        $count++;
        return "hola ". $count;
    };
}

$h1 = hi();
echo $h1()."\n";
echo $h1()."\n";
echo $h1()."\n";
echo $h1()."\n";

$h2 = hi();
echo $h2()."\n";
echo $h2()."\n";
echo $h2()."\n";
echo $h2()."\n";



