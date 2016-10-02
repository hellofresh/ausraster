<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\CSV;

use League\Csv\AbstractCsv;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Spreadsheet\WorksheetInterface;

class Worksheet implements WorksheetInterface
{
    /**
     * League/CSV instance
     * @var AbstractCSV
     */
    private $document;

    /**
     * Create a new Worksheet.
     * @param AbstractCsv $document
     */
    public function __construct(AbstractCsv $document)
    {
        $this->document = $document;
    }

    public function getName() : string
    {
        // Noop because a CSV can't have named sheets.
        return 'worksheet';
    }

    public function changeName(string $name) : WorksheetInterface
    {
        // Noop because a CSV can't have named sheets.
        return $this;
    }

    public function getCellAt(Coordinate $coordinate) : CellInterface
    {
        return new Cell($this->document, $coordinate);
    }
}
