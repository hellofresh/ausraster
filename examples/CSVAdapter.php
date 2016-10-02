<?php declare(strict_types=1);

use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CSV\Document;

require_once 'vendor/autoload.php';

$document = Document::open(__DIR__ . '/example.csv');

$worksheet = $document->getWorksheets()->first();

$cell = $worksheet->getCellAt(Coordinate::fromString('B2'));

echo $cell->getContent() . PHP_EOL;

$cell->fill('banana');

echo $cell->getContent() . PHP_EOL;
