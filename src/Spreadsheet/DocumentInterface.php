<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use Collections\VectorInterface;

interface DocumentInterface
{
    /**
     * Named constructor to open an existing document rather than create a new one.
     * @param string $filepath
     * @return DocumentInterface
     */
    public static function open(string $filepath) : DocumentInterface;

    /**
     * Write the document to the filesystem
     * @param  string $filepath
     * @return DocumentInterface
     */
    public function save(string $filepath) : DocumentInterface;

    /**
     * Serialize the document to a string, for example to download.
     * @return string
     */
    public function output() : string;

    /**
     * Get all worksheets in the document.
     * @return VectorInterface
     */
    public function getWorksheets() : VectorInterface;

    /**
     * Create a new worksheet in the document.
     * @return WorksheetInterface
     */
    public function createWorksheet() : WorksheetInterface;
}
