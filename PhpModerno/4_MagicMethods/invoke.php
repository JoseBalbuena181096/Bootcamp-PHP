<?php

class Add {
    public function __invoke($a, $b) {
        return $a + $b;
    }
}

class Validator {
    private $min;
    private $max;
    public $error;

    public function __construct($min, $max) {
        $this->min = $min;
        $this->max = $max;
    }
    public function __invoke($text) {
        $long = strlen($text);
        if ($long < $this->min || $long > $this->max) {
            $this->error = "El texto debe tener entre $this->min y $this->max caracteres";
            return false;
        }
        return true;
    }
}

// $add = new Add();
// echo $add(1, 2);

$validator = new Validator(5, 10);
if ($validator("hola")) {
    echo "Valido";
} else {
    echo $validator->error;
}
