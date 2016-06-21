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
    /**
     * PHPExcel instance.
     * @var PHPExcel
     */
    private $documentAdapter;

    /**
     * Collection of worksheets in the document.
     * @var ArrayList
     */
    private $worksheets;

    /**
     * Create a new Document.
     */
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
        $document = new static;
        $document->documentAdapter = PHPExcel_IOFactory::load($filepath);
        $worksheets = new ArrayList($this->documentAdapter->getSheetNames());

        $document->worksheets = $worksheets->map(function (string $sheetName) {
            return new Worksheet($document->documentAdapter->getSheetByName($sheetName));
        });

        return $document;
    }

    /**
     * {@inheritdoc}
     */
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
    public function output() : string
    {
        ob_start();
        $this->save('php://output');
        return ob_get_clean();
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
