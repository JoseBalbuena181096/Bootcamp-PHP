<?php

// La composicion es mejor que la herencia

interface ISendProject {
    public function send();
}

interface ISendMail {
    public function send();
}


class SendMail implements ISendMail {
    public function send(){
        echo "Se ha enviado el correo";
    }
}

class Project{
    public function create(){
        echo "Se ha creado el proyecto";
    }   
}

class SalesProject extends Project implements ISendProject{
    private ISendMail $sender;

    public function __construct(ISendMail $sender){
        $this->sender = $sender;
    }

    public function send(){
        $this->sender->send();
    }
}

class InternalProject extends Project{
    // extra
}

function send(ISendProject $project){
    $project->send();
}

$sendMail = new SendMail();
$project = new SalesProject($sendMail);

send($project);