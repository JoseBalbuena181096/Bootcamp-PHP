<?php

class Engine{
    public function __construct($fileName){
        $this->fileName = $fileName;
    }

    public function start(){
        echo "Arrancando el motor\n";
    }

    public function stop(){
        echo "Apagando el motor\n";
    }

    public function __call($name, $args){
        // echo "LLamando al método 'name' "
        // ."con los argumentos "
        // .implode(",", $args)."\n";
        $message = $name . " : " ;
        $message .= $args[0];
        $message .= " ";
        $message .= date("Y-m-d H:i:s");
        $message .= "\n";
        if(!file_exists($this->fileName)){
            file_put_contents($this->fileName, "");
        }
        file_put_contents($this->fileName, $message, FILE_APPEND);
    }

    public static function __callStatic($name, $args){
        // echo "LLamando al método estático 'name' "
        // ."con los argumentos "
        // .implode(",", $args)."\n";
        $message = $name . " : " ;
        $message .= $args[0];
        $message .= " ";
        $message .= date("Y-m-d H:i:s");
        $message .= " \n";
        if(!file_exists($this->fileName)){
            file_put_contents($this->fileName, "");
        }
        file_put_contents($this->fileName, $message, FILE_APPEND);
    }
}

$engine = new Engine("log.txt");
$engine->error("un error ocurrio");
$engine->log("El usuario ha hecho lo siguiente");
$engine->warning("auxilio algo paso");



