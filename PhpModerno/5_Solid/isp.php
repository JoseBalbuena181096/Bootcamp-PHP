<?php

/*
Principio de segregación de interfaces

Dice que las clases que imlementan interfaces, no deben de depender de
clases que no utilizan.

*/

interface CrudBaseInterface{
    public function add();
    public function read();
}


interface UpdateCrudInterface{
    public function update();
}

interface DeleteCrudInterface{
    public function delete();
}

interface GeneralCrudInterface extends CrudBaseInterface, UpdateCrudInterface,
 DeleteCrudInterface{

}

class UserCrud implements GeneralCrudInterface{
    public function add(){
        echo "Se ha agregado el usuario";
    }
    public function read(){
        echo "Se ha leido el usuario";
    }
    public function update(){
        echo "Se ha actualizado el usuario";
    }
    public function delete(){
        echo "Se ha eliminado el usuario";
    }
}

class SaleCrud implements CrudBaseInterface, DeleteCrudInterface{
    public function add(){
        echo "Se ha agregado la venta";
    }
    public function read(){
        echo "Se ha leido la venta";
    }
    public function delete(){
        echo "Se ha eliminado la venta";
    }
}


function generalCrud(GeneralCrudInterface $crud){
    $crud->add();
    $crud->update();
    $crud->delete();
    $crud->read();
}

function crudSale(SaleCrud $crud){
    $crud->add();
    $crud->delete();
    $crud->read();
}
generalCrud(new UserCrud());
crudSale(new SaleCrud());

