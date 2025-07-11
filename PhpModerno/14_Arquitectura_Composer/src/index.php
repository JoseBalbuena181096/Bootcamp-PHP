<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\interfaces\ExcelInterface;
use app\interfaces\DataInterface;
use app\data\BeerData;
use app\excel\CreatorExcel;
use app\business\GeneratorExcel;

$now = date('Y-m-d');
$file_path = __DIR__ . '/../files/beer-' . $now . '.xlsx';

$repository = new BeerData();
$excel = new CreatorExcel();
$generator = new GeneratorExcel($repository, $excel);

$generator->generate($file_path);

echo "File generated: " . $file_path;