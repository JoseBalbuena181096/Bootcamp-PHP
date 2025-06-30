<?php

trait EmailSender{
    public function sendEmail(){
        echo "Enviando email...<br>";
    }
}

trait DB{
    public function save(){
        echo "Guardando en la base de datos...<br>";
    }
}

trait Log{
    protected function log(string $message, string $fileName){
        if(!file_exists($fileName)){
            file_put_contents($fileName, $message);
        }
        $current = file_get_contents($fileName);
        $current .= date("Y-m-d H:i:s") . " - " . $message . "\n";
        file_put_contents($fileName, $current);
    }
}

class Invoice{
    use EmailSender,DB,Log;
    
    public function create(){
        $this->sendEmail();
        $this->save();
        $this->log("Invoice created", "invoice.log");
    }
}   



$invoice = new Invoice();
$invoice->create();