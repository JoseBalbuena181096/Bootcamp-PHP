<?php
$numero = 1;
$decimal = 1.1;
$boolean = true;
$texto = "Hola";
$empty = null;

echo gettype($numero);
echo gettype($decimal);
echo gettype($boolean);
echo gettype($texto);
echo gettype($empty);

// casting data types
$numero = (string) $numero;
echo gettype($numero);