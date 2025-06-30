<?php

class Discount{
    protected $discount;

    public function __construct($discount){
        $this->discount = $discount;
    }
    
    public function getDiscount($price){
        echo "Se aplica el descuento: ";
        return $price * $this->discount;
    }
}


class BlackFridayDiscount extends Discount{
    const BLACKFRIDAY_DISCOUNT = 2;
    public function getDiscount($price){
        echo "Se aplica el descuento de Black Friday: ";
        return $price * $this->discount * self::BLACKFRIDAY_DISCOUNT;
    }
}

$discount = new Discount(0.5);
echo $discount->getDiscount(100);

$blackFridayDiscount = new BlackFridayDiscount(0.5);
echo $blackFridayDiscount->getDiscount(100);