<?php

require_once __DIR__ . '/../vendor/autoload.php';


use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$now = Carbon::now(); 
echo "La fecha actual es: " . $now->toDateTimeString();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
$sheet->setCellValue('A2', $now->toDateTimeString());

$writer = new Xlsx($spreadsheet);
$fileName = 'excel.xlsx';
$writer->save('exceles/' . $fileName);
echo "El archivo se ha guardado en exceles/" . $fileName;