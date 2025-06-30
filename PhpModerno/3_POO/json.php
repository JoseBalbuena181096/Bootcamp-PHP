<?php


class Beer{
    public $name;
    public $brand;
    public $alcohol;
    public $isStrong;

    public function __construct($name, $brand, $alcohol, $isStrong){
        $this->name = $name;
        $this->brand = $brand;
        $this->alcohol = $alcohol;
        $this->isStrong = $isStrong;
    }

}


$beer = new Beer("Corona", "Corona", 15.6, true);
// transformar a json
$json = json_encode($beer);
echo $json;


$jsonbeer = '{"name":"Corona","brand":"Corona","alcohol":15.6,"isStrong":true}';
$objbeer = json_decode($jsonbeer);
print_r($objbeer);

$arr = [
    "name" => "Jose",
    "country" =>"Mexico" 
];

$jsonarr = json_encode($arr);
echo $jsonarr;

$newarr = json_decode($jsonarr, true);
echo $newarr['name'];
