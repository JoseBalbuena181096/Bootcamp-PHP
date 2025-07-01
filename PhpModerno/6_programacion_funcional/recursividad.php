<?php

// Una funcion recursiva es aquella que se llama a si misma
//  tienen un caso base y un caso recursivo
// el caso base es aquello que detiene la recursion
// el caso recursivo es aquello que llama a la funcion
// recursiva

function show($n){
    // caso base
    if($n < 0){
        return;
    }
    // caso recursivo
    echo $n."<br>";
    show($n-1);
}

show(10);

