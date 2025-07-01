<?php
$const =5;

$sum = fn(float $a, float $b): float => $a + $b;

// los parametros se mandan al momento de la invocacion
// y use se manda al momento de la creacion de la funcion
$some = function(float $a, float $b) use ($const) : float {
    return $a + $b + $const;
};

function showResult(callable $fn, float $a, float $b): void{
    echo $fn($a, $b)."<br>";
}

showResult($sum, 1.1, 2.2);
showResult($some, 1.1, 2.2);


showResult(fn($a, $b) => $a * $b, 1.1, 2.2);