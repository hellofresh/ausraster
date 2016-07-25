<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Cell;
use PHPExcel_Style_Fill;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Spreadsheet\StyleInterface;

class Cell implements CellInterface
{
    private $adapterCell;

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
    public function style(StyleInterface $style) : CellInterface
    {
        $adapterStyle = $this->adapterCell->getStyle()->applyFromArray([
            'fill' => [
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => [ 'rgb' => $style->getFill() ],
            ],
        ]);

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
