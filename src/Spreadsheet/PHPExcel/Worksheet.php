<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Worksheet;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Spreadsheet\WorksheetInterface;

class Worksheet implements WorksheetInterface
{
    private $adapterWorksheet;

    public function __construct(PHPExcel_Worksheet $adapterWorksheet)
    {
        $this->adapterWorksheet = $adapterWorksheet;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
        return $this->adapterWorksheet->getTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function changeName(string $name) : WorksheetInterface
    {
        $this->adapterWorksheet->setTitle($name);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCellAt(Coordinate $coordinate) : CellInterface
    {
        return new Cell($this->adapterWorksheet->getCell((string) $coordinate));
    }
}
