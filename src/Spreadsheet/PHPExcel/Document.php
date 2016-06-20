<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Writer_Excel2007;
use Collections\ArrayList;
use Collections\VectorInterface;
use HelloFresh\Ausraster\Spreadsheet\DocumentInterface;
use HelloFresh\Ausraster\Spreadsheet\WorksheetInterface;

class Document implements DocumentInterface
{
    private $documentAdapter;
    private $worksheets;

    public function __construct()
    {
        $this->documentAdapter = new PHPExcel;
        $this->documentAdapter->removeSheetByIndex();
        $this->worksheets = new ArrayList;
    }

    /**
     * {@inheritdoc}
     */
    public static function open(string $filepath) : DocumentInterface
    {
        $this->documentAdapter = PHPExcel_IOFactory::load($filepath);
        $worksheets = new ArrayList($this->documentAdapter->getSheetNames());

        $this->worksheets = $worksheets->map(function (string $sheetName) {
            return new Worksheet($this->documentAdapter->getSheetByName($sheetName));
        });

        return $this;
    }

    public function save(string $filepath) : DocumentInterface
    {
        $writer = new PHPExcel_Writer_Excel2007($this->documentAdapter);
        $writer->setPreCalculateFormulas(false);
        $writer->save($filepath);
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
        $worksheet = new Worksheet($this->documentAdapter->createSheet());
        $this->worksheets->add($worksheet);
        return $worksheet;
    }
}
