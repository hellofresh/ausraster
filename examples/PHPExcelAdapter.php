<?php declare(strict_types=1);

use HelloFresh\Ausraster\Font;
use HelloFresh\Ausraster\Color;
use HelloFresh\Ausraster\Spreadsheet\Style;
use HelloFresh\Ausraster\Spreadsheet\CoordinateRange;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\PHPExcel\Document;

require_once 'vendor/autoload.php';

// First we need to create a new Excel Document.
// Can also use Document::open('filename.xlsx') to open an existing document.
$document = new Document();

// A Document has no Worksheets by default, so we need to add one. Its name is auto-generated.
$worksheet = $document->createWorksheet();

// The Coordinate ValueObject helps to ensure validity of coordinates.
// Can also do Coordinate::fromString('A1').
$coordinate = new Coordinate('A', 1);

// Get a Cell instance and fill its contents.
$cell = $worksheet->getCellAt($coordinate);
$cell->fill('This is cell A1');

// Change the cell's font
$font = (new Font())->setName('Helvetica');
$style = (new Style())->setFont($font);

$cell->style($style);
$cell->resizeWidth();

// Create a second worksheet
$worksheet2 = $document->createWorksheet();
$worksheet2->changeName('Testings');

$cell = $worksheet2->getCellAt($coordinate);
$cell->fill('A1 2');
$cell->resizeHeight(100);

// We can style a range of cells, too.
$font->setColor(new Color('#555555'))->setBold(true)->setSize(16);
$style = (new Style())->setFont($font)->setFill(new Color('#efefef'));

$coordinateRange = new CoordinateRange(new Coordinate('A', 1), new Coordinate('B', 4));

// CellRange is an iterator, so we can loop over the cells now and style each.
foreach ($coordinateRange as $coordinate) {
    $worksheet2->getCellAt($coordinate)->style($style);
}

// Save the document to the server's filesystem.
$document->save('test.xlsx');

// This is how you'd set up a document to download.
// Of course, if you have something like HttpFoundation, use that to set the headers instead!
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment;filename=test.xlsx');
echo $document->output();
