<?php

interface BeerInterface
{
    public function getPrice(): float;
}

class Lager implements BeerInterface
{
    private float $tax;
    private float $price;

    public function __construct(float $price, float $tax)
    {
        $this->tax = $tax;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price + $this->tax;
    }
}

class IPA implements BeerInterface
{
    private float $discount;
    private float $price;

    public function __construct(float $price, float $discount)
    {
        $this->discount = $discount;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }
}

abstract class BeerFactory
{
    abstract public function create(array $params): BeerInterface;
}


class LagerFactory extends BeerFactory
{
    public function create(array $params): BeerInterface
    {
        return new Lager($params['price'], $params['tax']);
    }
}


class IPAFactory extends BeerFactory
{
    public function create(array $params): BeerInterface
    {
        $discount = $params['price'] > 10 ? $params['price'] * 0.95 : $params['price'] * 0.85;
        return new IPA($params['price'], $discount);
    }
}

$factoryLager = new LagerFactory();
$lager= $factoryLager->create(['price' => 10, 'tax' => 2]);
echo $lager->getPrice()."<br>";

$factoryIPA = new IPAFactory();
$IPA = $factoryIPA->create(['price' => 10, 'discount' => 2]);
echo $IPA->getPrice()."<br>";

