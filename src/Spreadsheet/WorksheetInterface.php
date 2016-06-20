<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

interface WorksheetInterface
{
    /**
     * Get the worksheet's name.
     * @return string
     */
    public function getName() : string;

    /**
     * Rename a worksheet.
     * @param string $name
     * @return WorksheetInterface
     */
    public function changeName(string $name) : WorksheetInterface;

    /**
     * Retrieve the cell at the given coordinates.
     * @param Coordinate $coordinate
     * @return CellInterface
     */
    public function getCellAt(Coordinate $coordinate) : CellInterface;
}
