<?php

namespace HelloFresh\Ausraster\Spreadsheet\PhpExcel;

use Collections\ArrayList;
use Collections\VectorInterface;
use HelloFresh\Ausraster\Spreadsheet\DocumentInterface;

class Document implements DocumentInterface
{
    private $worksheets;

    public function __construct()
    {
        $this->document = new PhpExcel;
        $this->document->removeSheetByIndex();
        $this->worksheets = new ArrayList;
    }

    /**
     * {@inheritdoc}
     */
    public static function open(string $filepath) : DocumentInterface
    {
        $this->document = PHPExcel_IOFactory::load($filepath);
        $worksheets = new ArrayList($this->document->getSheetNames());

        $this->worksheets = $worksheets->map(function (string $sheetName) {
            return new Worksheet($this->document->getSheetByName($sheetName));
        });

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getWorksheets() : VectorInterface
    {
        return $this->worksheets;
    }

    /**
     * {@inheritdoc}
     */
    public function createWorksheet() : WorksheetInterface
    {
        $worksheet = new Worksheet;
        $this->worksheets->add(new Worksheet);
        return $worksheet;
    }
}
