<?php
$numbers = [1,2,3,4,5,6,7,8,9,10];

function process(array $arr, callable $func): array{
    $newArr = [];
    foreach($arr as $item){
        $newArr[] = $func($item);
    }
    return $newArr;
}

$result1 = process($numbers, fn($num) => $num * 20);
foreach($result1 as $item){
    echo $item . "\n";
}

$result2 = process($numbers, fn($num) => $num + 2);
foreach($result2 as $item){
    echo $item . "\n";
}


$result3 = process($numbers, fn($num) => "<h1>$num</h1>");
echo implode("", $result3);

