<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Worksheet;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Spreadsheet\WorksheetInterface;

class Worksheet implements WorksheetInterface
{
    /**
     * PHPExcel Worksheet Instance
     * @var PHPExcel_Worksheet
     */
    private $adapterWorksheet;

    /**
     * Create a new Worksheet.
     * @param PHPExcel_Worksheet $adapterWorksheet
     */
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
    
    /**
     * {@inheritdoc}
     */
    public function columnsAutoSizeByRange(string $from, string $to)
    {
        foreach (range($from, $to) as $columnID) {
            $this->adapterWorksheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getStyleAt(Coordinate $coordinate) : StyleInterface
    {
        return $this->styleAt((string) $coordinate);
    }

    /**
     * {@inheritdoc}
     */
    public function getStyleAtRange(CoordinateRange $range) : StyleInterface
    {
        return $this->styleAt((string) $range);
    }

    /**
     * @param string $value
     *
     * @return StyleInterface
     */
    private function styleAt(string $value) : StyleInterface
    {
        return new Style($this->adapterWorksheet->getStyle($value));
    }
}
