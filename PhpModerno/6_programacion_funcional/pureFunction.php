<?php

class Counter {
    public $count = 0;
}

$counter = new Counter();

function showCount(Counter $counter) {
    $counter->count++;
    return $counter->count."<br>";
}

echo showCount($counter);
echo showCount($counter);
echo showCount($counter);
echo showCount($counter);

// showCount es una funcion impura 
// porque modifica el estado de $counter
// debido a que se pasa por referencia el objeto

echo $counter->count;

// 
function add(float $a, float $b):float {
    return $a + $b;
}

// add es una funcion pura
// porque no modifica el de las variables
// que recibe como argumentos 
// ya que las variables primitivas
// son pasadas por valor y no por referencia

echo add(1, 2);

// las funciones puras nos permiten realizar
// pruebas unitarias mas facilmente

// En programacion concurrente 
// las funciones puras son mas fáciles de 
// implementar
