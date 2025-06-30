<?php

/**
 Inversión de dependencias

 Este principio establece que las clases no deben depender de detalles de
 implementación, sino de abstracciones. En lugar de tener una clase 
 que depende de otra clase concreta, debes usar interfaces o abstractas
  para establecer la dependencia.

  Los modulos de alto nivel no deben depender de los de bajo nivel,
  sino que ambos deben depender de abstracciones.

  Las abstracciones son cuando tu creas elementos que define que es lo que
  hace, no como lo hace, clases abstractas o interfaces.

  Se indica que las abastraciones se deben tener internamente. 
  Los modulos de alto nivel son los modulos que contienen las reglas
  de negocio de la aplicacion. Ejemplo la regla de negocio de un carrito
  de compras. Cuantos elementos se pueden agregar al carrito, cuantos
  productos se pueden agregar al carrito, etc.

  Un modulo de bajo nivel son modulos con funcionamiento basico, conexiones
  a base de datos, operaciones matematicas, elementos ya especificos en el 
  framework.

  Los modulos de bajo nivel son los que mas cambian, y las reglas de 
  negocio son los que menos cambian.

  Una cervesa no se preocupa como se genera la levadura, una
  cantina no se preocupa como se hace la levadura.
*/

interface ReportInterface{
    public function generate(string $content):string;
}

class PDFReport implements ReportInterface{
    public function generate(string $content):string{
        return "Se crea pdf con el siguiente contenido: " . $content;
    }
}

class HTMLReport implements ReportInterface{
    public function generate(string $content):string{
        return "Se crea html con el siguiente contenido: " . $content;
    }
}

class ExcelReport implements ReportInterface{
    public function generate(string $content):string{
        return "Se crea excel con el siguiente contenido: " . $content;
    }
}

class Estimate{
    private ReportInterface $report;

    public function __construct(ReportInterface $report){
        $this->report = $report;
    }

    public function process(){
        echo "Se genera la estimacion<br>";
        echo $this->report->generate("Contenido estimacion");
    }
}



$estimate = new Estimate(new HTMLReport());
$estimate->process();

$estimate = new Estimate(new PDFReport());
$estimate->process();

$estimate = new Estimate(new ExcelReport());
$estimate->process();

