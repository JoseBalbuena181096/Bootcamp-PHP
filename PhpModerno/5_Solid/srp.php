<?php

// Single Responsibility Principle
/* 
Principio de responsabilidad única
Establece que una clase debe tener una sola responsabilidad
Una clase que hace el guardado de datos en una base de datos, no puede tener la responsabilidad
de enviar correos electrónicos.

Tenr la clase como respomnsabilidad unica hace que sea facil modificarla, entender y 
tener un mejor mantenimiento.
*/


// Esta clase no cumple con el principio de responsabilidad única

class Order{
    private $items = [];
    private $total;

    public function addItem($description, $price){
        $this->items[] = [
            'description' => $description,
            'price' => $price
        ];
    }

    public function createOrder(){
        echo 'Procesando el pedido';
        $this->sendEmail();   
    }

    private function sendEmail(){
        echo 'Enviando correo\n';
    }
}

// Para corregirlo, se debe crear una clase que solo se encargue de enviar correos electrónicos

class EmailNotifier{
    public function send(OrderSRP $order){
        echo 'El pedido se ha creado correctamente, total: ' . $order->getTotal() . '\n';
    }
}

// Ahora la clase Order solo se encarga de procesar el pedido
class OrderSRP{
    private $items = [];
    private $total;

    public function addItem($description, $price){
        $this->items[] = [
            'description' => $description,
            'price' => $price
        ];
        $this->total += $price;
    }

    public function createOrder(){
        echo 'Procesando el pedido'; 
    }

    public function getTotal(){
        return $this->total;
    }
}


$order = new OrderSRP();
$order->addItem('Producto 1', 100);
$order->addItem('Producto 2', 200);
$order->createOrder();

$notifier = new EmailNotifier();
$notifier->send($order);
