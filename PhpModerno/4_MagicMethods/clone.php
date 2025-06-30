<?php

// $array1 = [1, 2, 3];
// $array2 = $array1;
// $array2[] = 10;

// print_r($array1);
// print_r($array2);

class A{
    public string $label;
}

class Some{
    public string $name;

    public A $a;
    public function __clone(){
        $this->name = strtoupper($this->name);
        // solucion de la copia profunda
        $this->a = clone $this->a;
    }
}

function change(Some $some){
    $some->name = "Changed";
}

$some = new Some();
$some->name = "Original";
$some2 = $some;
echo $some->name."<br>";
echo $some2->name."<br>";    
echo "<hr>";
change($some2);
echo $some->name."<br>";
echo $some2->name."<br>";

/*
Cuando se asigna un objeto a otra variable, se crea una referencia, no una copia. 
Es decir ambas variables apuntan al mismo objeto. Por lo tanto, si se modifica el objeto de una 
variable, ambas variables se verán afectadas. 

El paso de objetos a funciones también se hace por referencia. Por lo tanto, si se modifica el 
objeto dentro de la función, el objeto original también se verá afectado. 

Si tengo un objeto que contiene otro objeto, cuando clono el objeto, el objeto interno
no se clona. Ese objeto seguira apuntado al mismo objeto.
*/

$some3 = clone $some;
echo $some->name."<br>";
echo $some2->name."<br>";    
echo "<hr>";
change($some2);
echo $some->name."<br>";
echo $some2->name."<br>";
echo $some3->name."<br>";