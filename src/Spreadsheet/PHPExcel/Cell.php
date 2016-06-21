<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Cell;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;

class Cell implements CellInterface
{
    /**
     * Cell constructor.
     * @param PHPExcel_Cell $adapterCell
     */
    public function __construct(PHPExcel_Cell $adapterCell)
    {
        $this->adapterCell = $adapterCell;
    }

    /**
     * {@inheritdoc}
     */
    public function fill(string $content) : CellInterface
    {
        $this->adapterCell->setValue($content);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCoordinate() : Coordinate
    {
        $coordinates = Coordinate::fromString($this->adapterCell->getCoordinate());
    }

    /**
     * {@inheritdoc}
     */
    public function getContent() : string
    {
        return $this->adapterCell->getValue();
    }
}
