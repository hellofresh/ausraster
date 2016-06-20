<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Cell;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;

class Cell implements CellInterface
{
    public function __construct(PHPExcel_Cell $adapterCell)
    {
        $this->adapterCell = $adapterCell;
    }
    /**
     * Replace the cell's content with the provided string.
     * @param string $content
     * @return CellInterface
     */
    public function fill(string $content) : CellInterface
    {
        $this->adapterCell->setValue($content);
        return $this;
    }

    /**
     * Get the cell's coordinates.
     * @return Coordinate
     */
    public function getCoordinate() : Coordinate
    {
        $coordinates = Coordinate::fromString($this->adapterCell->getCoordinate());
    }

    /**
     * Get the cell's content.
     * @return string
     */
    public function getContent() : string
    {
        return $this->adapterCell->getValue();
    }
}
