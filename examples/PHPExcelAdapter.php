<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\PhpExcel\Document;

$document = new Document;

$worksheet = $document->createWorksheet();

$coordinate = new Coordinate('A', 1);

$cell = $worksheet->getCellAt($coordinate);
$cell->fill('A1');

$worksheet2 = $document->createWorksheet();
$worksheet2->changeName('Testings');

$cell = $worksheet2->getCellAt($coordinate);
$cell->fill('A1 2');

$document->save('test.xlsx');
