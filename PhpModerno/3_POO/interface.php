<?php

interface SendInterface{
    public function send(string $message);
}

interface SaveInterface{
    public function save();
}
    
class Document implements SendInterface, SaveInterface{
    public function send(string $message){
        echo "Enviando: " . $message . "<br>";
    }
    public function save(){
        echo "Se guarda la venta en la nube.<br>";
    }
}

class BeerRepository implements SaveInterface{
    public function save(){
        echo "Se guarda la cerveza en la base de datos.<br>";
    }
}

class SaveProcess{
    private SaveInterface $saveManager;

    public function __construct(SaveInterface $saveManager){
        $this->saveManager = $saveManager;
    }

    public function save(){
        echo "Se inicia el proceso de guardado.<br>";
        $this->saveManager->save();
    }
}

$document = new Document();
$beerRepository = new BeerRepository();
$saveProcess = new SaveProcess($beerRepository);
$saveProcess->save();
