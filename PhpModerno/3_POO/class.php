<?php
declare(strict_types=1);
class Sale{
     
    protected float $total;
    private string $date;
    private array $concepts;
    public static int $count = 0;

    public function __construct(string $date){
        $this->setDate($date);
        $this->concepts = [];
        $this->total = 0;
        self::$count++;
    } 

    public function __toString(): string{
        return "Total: " . $this->total . "<br>" . "Date: " . $this->date."<br>";
    }
    
    public function createInvoice(){
        echo "Invoice created for " . $this->total . " on " . $this->date."<br>";
    }

    public function getTotal(): float{
        return $this->total;
    }
    public function getDate(): string{
        return $this->date;
    }
    public function setTotal(float $total){
        $this->total = $total;
    }
    public function setDate(string $date){
        //Validar que la fecha sea correcta
        $dateObject = \DateTime::createFromFormat('Y-m-d', $date);
        if(!$dateObject || $dateObject->format('Y-m-d') !== $date){
            throw new \InvalidArgumentException("La fecha no es valida");
        }
        $this->date = $date;
    }

    public static function getCount(): int{
        return self::$count;
    }
    public static function setCount(int $count){
        self::$count = $count;
    }

    public static function resetCount(){
        self::$count = 0;
    }

    public function addConcep(Concept $concept){
        $this->concepts[] = $concept;
        $this->total += $concept->getAmount();
    }

    public function getConcepts(): array{
        return $this->concepts;
    }

    public function setConcepts(array $concepts){
        $this->concepts = $concepts;
    }
    public function removeConcept(Concept $concept){
        $this->concepts = array_filter($this->concepts, fn($c) => $c !== $concept);
    }

    public function getTotalConcepts(): float{
        return array_sum(array_map(fn($c) => $c->getAmount(), $this->concepts));
    }

    public function getAllConcepts(){
        foreach($this->concepts as $concept){
            echo $concept;
        }
    }


    public function __destruct(){
        echo "Invoice deleted for " . $this->total . " on " . $this->date."<br>";
    }
}

class Concept{
    public string $description;
    public float|int $amount;
    
    public function __construct(string $description, float|int $amount){
        $this->description = $description;
        $this->amount = $amount;
    }

    public function __toString(): string{
        return "Description: " . $this->description . "<br>" . "Amount: " . $this->amount."<br>";
    }

    public function getAmount(): float|int{
        return $this->amount;
    }
}

// Herencia
class OnlineSale extends Sale{
  
    public $paymentMethod;
    public function __construct(string $date, string $paymentMethod){
        parent::__construct($date);
        $this->paymentMethod = $paymentMethod;
    }

    public function __toString(): string{
        return "Total: " . $this->total . "<br>" . "Date: " . $this->date."<br>" . "Payment Method: " . $this->paymentMethod."<br>";
    }


    public function createInvoice(){
        echo "Online invoice created for " . $this->total . " on " . $this->date."<br>";
    }
    public function showInfo(): string{
        return "La venta tiene un monto de  ".$this->total." y el metodo de pago es ".$this->paymentMethod."<br>";
    }
}



// $sale = new Sale(date("Y-m-d"));
// $sale->addConcep(new Concept("Concept 1", 10));
// $sale->addConcep(new Concept("Concept 2", 20));
// $sale->addConcep(new Concept("Concept 3", 30));
// echo $sale;
// $sale->createInvoice();
// unset($sale);
// $sale1 = new Sale(100, date("Y-m-d"));
// $sale2 = new Sale(100, date("Y-m-d"));
// $sale3 = new Sale(100, date("Y-m-d"));
// echo "Total sales: " . Sale::$count . "<br>";
// Sale::resetCount();
// echo "Total sales: " . Sale::$count . "<br>";

// $sale->allConcepts();

// // Polimorfismo
// $onlineSale = new OnlineSale(date("Y-m-d"), "targeta");
// $onlineSale->createInvoice();
// echo $onlineSale;
// $onlineSale->addConcep(new Concept("Concept Online 1", 10));
// $onlineSale->addConcep(new Concept("Concept Online 2", 20));
// $onlineSale->addConcep(new Concept("Concept Online 3", 30));
// $onlineSale->allConcepts();
// echo $onlineSale->showInfo();


/**
NULL es un tipo de dato en php que representa la ausencia de un valor.

El encapsilamiento en php se logra con los modificadores de acceso:
- public: se puede acceder desde cualquier lugar
- private: se puede acceder solo desde la clase
- protected: se puede acceder desde la clase y las clases hijas

El polimorfismo en php se logra con la sobrecarga de metodos y la sobrecarga de operadores.

Getter y setter son metodos que permiten acceder a los atributos privados de una clase.

* */


$sale = new Sale(date("Y-m-d"));
$sale->addConcep(new Concept("Cerveza 1", 15));
$sale->addConcep(new Concept("Cerveza 2", 22));
$sale->addConcep(new Concept("Cerveza 3", 31));
echo $sale;

echo $sale->getAllConcepts();