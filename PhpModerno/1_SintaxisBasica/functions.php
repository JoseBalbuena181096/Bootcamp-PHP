<?php


function suma($a, $b) {
    return $a + $b;
}
echo suma(1, 2);

function hola( $nombre ) {
    return "Hola ".$nombre;
}

echo hola("Luis");

function add(int $a, int $b) : int {
    return $a + $b;
}
echo add(1, "2");
 