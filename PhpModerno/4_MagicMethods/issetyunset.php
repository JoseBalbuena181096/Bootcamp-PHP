<?php
// $a = 1;
// if(isset($b)){
//     echo "exists";
// }
// else{
//     echo "not exists";
// }

// unset($a);
// if(isset($a)){
//     echo "exists";
// }
// else{
//     echo "not exists";
// }

/**
 uset elimina la variable
 isset verifica si la variable existe
 */

 class Wine{
    public $color;
    public $grapes;
    public $origin;

    private $data = [
        "name" => "vinos"
    ];



    public function __construct($color, $grapes, $origin){
        $this->color = $color;
        $this->grapes = $grapes;
        $this->origin = $origin;
    }
    public function __isset($property){
        return isset($this->data[$property]);
    }
    public function __unset($property){
        unset($this->data[$property]);
    }
 }

 $wine = new Wine("red", "Cabernet Sauvignon", "France");
 if(isset($wine->color)){
    echo "exists";
}
else{
    echo "not exists";
}

unset($wine->color);
if(isset($wine->color)){
    echo "exists";
}
else{
    echo "not exists";
}


