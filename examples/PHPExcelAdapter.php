<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\PhpExcel\Document;

// First we need to create a new Excel Document.
// Can also use Document::open('filename.xlsx') to open an existing document.
$document = new Document;

// A Document has no Worksheets by default, so we need to add one. Its name is auto-generated.
$worksheet = $document->createWorksheet();

// The Coordinate ValueObject helps to ensure validity of coordinates.
// Can also do Coordinate::fromString('A1').
$coordinate = new Coordinate('A', 1);

// Get a Cell instance and fill its contents.
$cell = $worksheet->getCellAt($coordinate);
$cell->fill('This is cell A1');

$worksheet2 = $document->createWorksheet();
$worksheet2->changeName('Testings');

$cell = $worksheet2->getCellAt($coordinate);
$cell->fill('A1 2');

// Save the document to the server's filesystem.
$document->save('test.xlsx');

// This is how you'd set up a document to download.
// Of course, if you have something like HttpFoundation, use that to set the headers instead!
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment;filename=test.xlsx');
echo $document->output();
