<?php 

class Animal{
    public string $name;
    public int $age;
    public string $color;   

    // se ejecuta al deserializar
    public function __wakeup(){
        echo "Animal deserializado<br>";
        $this->age = 0;
    }
    
    // se ejecuta antes de serializar
    public function __sleep(){
        return ["name", "color"];
    }
}

$duke = new Animal();
$duke->name = "Duke";
$duke->age = 5;
$duke->color = "Black";

$dukeSerialized = serialize($duke);
echo $dukeSerialized."<br>";

$dukeUnserialized = unserialize($dukeSerialized);
echo $dukeUnserialized->name."<br>";
echo $dukeUnserialized->color."<br>";
