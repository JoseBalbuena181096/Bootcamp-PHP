<?php
// if (true) {
//     echo "verdadero";
// }
// else{
//     echo "falso";
// }

$edad = 60;

// if ($edad >= 18) {
//     echo "Mayor de edad";
// } else {
//     echo "Menor de edad";
// }

if($edad == 18){
    echo "Tienes 18 años";
}
else if($edad > 18 && $edad < 60){
    echo "Tienes mas de 18 años y menos de 60 años";
}
else if($edad >= 60){
    echo "Eres viejo";
}
else{
    echo "Tienes menos de 18 años";
}

/**
Operadores logicos
AND, OR, NOT
AND es un operador que evalua que todas las condiciones sean verdaderas
OR es un operador que evalua que al menos una condicion sea verdadera
NOT es un operador que evalua que una condicion sea falsa
*/