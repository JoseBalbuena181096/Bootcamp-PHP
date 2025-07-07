<?php

interface IStrategy
{
    public function get():array;
}

class ArrayStrategy implements IStrategy
{
    private array $data = ["Titulo 1", "Titulo 2", "Titulo 3"];
    public function get():array
    {
        return $this->data;
    }
}

class UrlStrategy implements IStrategy
{
    private string $url;
    public function __construct(string $url)
    {
        $this->url = $url;
    }
    public function get():array
    {
        $data = file_get_contents($this->url);
        $arr = json_decode($data, true);
        return array_map(fn($item) => $item['title'], $arr);
    }
}

class InfoPrinter
{
    private IStrategy $strategy;
    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
    public function print():void
    {
        $data = $this->strategy->get();
        foreach ($data as $item) {
            echo $item . "<br>";
        }
    }
}

$arrayStrategy = new ArrayStrategy();
$printer = new InfoPrinter($arrayStrategy);
$printer->print();

$urlStrategy = new UrlStrategy("https://jsonplaceholder.typicode.com/posts");
$printer = new InfoPrinter($urlStrategy);
$printer->print();