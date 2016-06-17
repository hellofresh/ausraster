<?php

namespace HelloFresh\Ausraster\Spreadsheet;

use Collections\MapInterface;

interface DocumentInterface
{
    /**
     * Get all worksheets in the document.
     * @return MapInterface
     */
    public function getWorksheets() : MapInterface;

    /**
     * Create a new worksheet in the document.
     * @return WorksheetInterface
     */
    public function createWorksheet() : WorksheetInterface;
}
