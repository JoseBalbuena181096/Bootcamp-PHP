<?php

/*
Principio de sustitución de Liskov (Liskov Substitution Principle)
Establece que los objetos de una superclase deben ser reemplazables 
con objetos de sus subclases sin afectar la correctitud del programa.

Si tienes una clase hija, esta podria ser sustituida por su clase padre 
sin afectar la correctitud del programa. Es decir la clase B que hereda 
de la clase A, podria ser sustituida por la clase A sin afectar la correctitud 
del programa.

Indica que no te vas a encontrar con cosas que no cumplen 
con el contrato de la clase padre.
*/

class Project {
    public function create() {
     echo "Se ha creado el proyecto";   
    }

    public function send(){
        echo "Se ha enviado el proyecto";
    }
}

class SalesProject extends Project {
    // aqui mas funcionalidades
}

class InternalProject extends Project {
    // aqui mas funcionalidades
    public function send(){
        throw new Exception("No se puede enviar el proyecto");
    }
}

function sendProject(Project $project){
    $project->send();
}

// sendProject(new Project());
// sendProject(new SalesProject());
// sendProject(new InternalProject());


// La solucion es usar interfaces 
interface ISendProject {
    public function send();
}

class ProjectLSP {
    public function create() {
        echo "Se ha creado el proyecto";   
    }
}

class SalesProjectLSP extends ProjectLSP implements ISendProject {
    public function send(){
        echo "Se ha enviado el proyecto";
    }
}

class InternalProjectLSP extends  ProjectLSP{

}

function send(ISendProject $project){
    $project->send();
}

send(new SalesProjectLSP());

