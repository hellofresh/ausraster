<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\CSV;

use League\Csv\Writer;
use Collections\ArrayList;
use Collections\VectorInterface;
use HelloFresh\Ausraster\Spreadsheet\DocumentInterface;
use HelloFresh\Ausraster\Spreadsheet\WorksheetInterface;

class Document implements DocumentInterface
{
    /**
     * League/CSV instance
     * @var AbstractCsv
     */
    private $documentAdapter;

    /**
     * Worksheet within the document (CSVs have only one worksheet)
     * @var WorksheetInterface[]
     */
    private $worksheets;

    public function __construct()
    {
        $this->documentAdapter = Writer::createFromFileObject(new \SplTempFileObject());
    }

    /**
     * {@inheritdoc}
     */
    public static function open(string $filepath) : DocumentInterface
    {
        $document = new static();
        $document->documentAdapter = Writer::createFromFileObject(new \SplFileObject($filepath));
        $document->worksheets = new ArrayList([ new Worksheet($document->documentAdapter) ]);

        return $document;
    }

    public function save(string $filepath) : DocumentInterface
    {

    }

    public function output() : string
    {

    }

    /**
     * {@inheritdoc}
     * In this case there is a maxiumum of 1 worksheet due to the limitations of CSV.
     */
    public function getWorksheets() : VectorInterface
    {
        return $this->worksheets;
    }

    /**
     * {@inheritdoc}
     * @throws \RuntimeException
     */
    public function createWorksheet() : WorksheetInterface
    {
        if ($this->worksheets === null) {
            $this->worksheets = new ArrayList();
        }

        if ($this->worksheets->count()) {
            throw new \RuntimeException('A CSV can only have one worksheet.');
        }

        $worksheet = new Worksheet($this->documentAdapter);
        $this->worksheets->add($worksheet);
        return $worksheet;
    }
}
