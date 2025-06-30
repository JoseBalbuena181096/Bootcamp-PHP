<?php

/*
Principio de abierto/cerrado (Open/Closed Principle)
Establece que una clase debe estar abierta para extender y cerrada para modificar.

Quiere decir que si se tiene funcionamienteo se debe extender y no modificar lo ya hecho, no se debe
modificar la logica que ya esta hecha y funciona correctamente.
*/

class Calculator{
    public function calculate($a, $b, $operation){
        if($operation == 'add'){
            return $a + $b;
        }elseif($operation == 'subtract'){
            return $a - $b;
        }elseif($operation == 'multiply'){
            return $a * $b;
        }elseif($operation == 'divide'){
            return $a / $b;
        }
    }
}

// si yo quero agregar una nueva operacion, debo extender la clase, tengo el problema
// de que debo modificar la logica de la clasey  violo el principio de abierto/cerrado.

$calculator = new Calculator();
echo $calculator->calculate(1, 2, 'add');


// solucion usando interfaces
interface OpInterface{
    public function calculate(float $a, float $b): float;
}

class Add implements OpInterface{
    public function calculate(float $a, float $b): float{
        return $a + $b;
    }
}

class Subtract implements OpInterface{
    public function calculate(float $a, float $b): float{
        return $a - $b;
    }
}

class Multiply implements OpInterface{
    public function calculate(float $a, float $b): float{
        return $a * $b;
    }
}
class Divide implements OpInterface{
    public function calculate(float $a, float $b): float{
        return $a / $b;
    }
}

class CalculatorOCP{
    private OpInterface $operation;
    public function __construct(OpInterface $operation){
        $this->operation = $operation;
    }

    public function calculate(float $a, float $b): float{
        return $this->operation->calculate($a, $b);
    }
}

// ahora puedo agregar una nueva operacion sin modificar la logica de la clase
$add = new Add();
$sub = new Subtract();
$mul = new Multiply();
$div = new Divide();

$calculator = new CalculatorOCP($add);
echo $calculator->calculate(1, 2)."<br>";

$calculator = new CalculatorOCP($sub);
echo $calculator->calculate(1, 2)."<br>";

$calculator = new CalculatorOCP($mul);
echo $calculator->calculate(1, 2)."<br>";

$calculator = new CalculatorOCP($div);
echo $calculator->calculate(1, 2)."<br>";

