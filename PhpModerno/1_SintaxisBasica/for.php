<?php

// for ($i = 0; $i < 10; $i++) {
//     echo $i . "<br>";
// }

for ($i = 10; $i >= 0; $i--) {
    if ($i % 2 == 0) {
        echo $i."Es par <br>";
    } else {
        echo $i."Es impar <br>";
    }
}

/**
 
break: termina el bucle
continue: salta la iteracion actual
 */