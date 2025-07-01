<?php

$some = function (float $a, float $b): float{
    return $a + $b;
};


var_dump($some(1, 2));
var_dump($some(3, 2));
var_dump($some(2, 2));