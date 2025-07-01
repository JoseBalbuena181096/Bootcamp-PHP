<?php
// La funcion pura siempre te va a retornar el mismo resultado
//  bajo el mismo argumento

// funcion determinista
$add = function ($a, $b){
    return $a + $b;
};

$mul = function ($a, $b){
    return $a * $b;
};

// closure
function memoize($func){
    $cache = [];
    // los array en php no se pasan por referencia 
    return function($a, $b) use(&$cache, $func){
        $index = $a."-".$b;
        if(isset($cache[$index])){
            echo "Ya existia operación <br>";
            return $cache[$index];
        }
        echo "No existia operación <br>";
        $cache[$index] =  $func($a, $b);
        return $cache[$index];
    };
}
$mySum = memoize($add);
echo $mySum(1, 2);
echo $mySum(1, 2);
echo $mySum(1, 2);

$myMul = memoize($mul);
echo $myMul(10, 22);
echo $myMul(10, 22);
echo $myMul(10, 22);



