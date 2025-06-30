
<?php

abstract class Product{
    protected string $name;
    protected float $price;

    abstract public function calculatePrice(): float;

    public function getName(): string{
        return $this->name;
    }
    public function getPrice(): float{
        return $this->price;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function setPrice(float $price){
        $this->price = $price;
    }
    public function __toString(): string{
        return "Name: " . $this->name . "<br>" . "Price: " . $this->price . "<br>";
    }

}

class Beer extends Product{
    const TAX = 1.16;

    public function __construct(string $name, float $price){
        $this->name = $name;
        $this->price = $price;
    }

    public function calculatePrice(): float{
        return $this->price * self::TAX;
    }
    public function __toString(): string{
        return "Beer Name: " . $this->name . "<br>" . "Price: " . $this->price . "<br>";
    }
}

function calculateTotalPrice(Product $product): float{
    return $product->calculatePrice();
}

$beer = new Beer("Corona", 10);
echo $beer;
echo calculateTotalPrice($beer);

