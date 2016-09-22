<?php declare(strict_types=1);

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
                'type'      => $style->getFill() ? PHPExcel_Style_Fill::FILL_SOLID : PHPExcel_Style_Fill::FILL_NONE,
                'color'     => [ 'argb' => $style->getFill() ?: '00ffffff' ],
            ],
            'font' => [
                'name'      => $style->getFont()->getName(),
                'size'      => $style->getFont()->getSize(),
                'bold'      => $style->getFont()->isBold(),
                'italic'    => $style->getFont()->isItalic(),
                'underline' => $style->getFont()->isUnderlined(),
                'color'     => [ 'argb' => (string) $style->getFont()->getColor() ],
            ],
        ]);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCoordinate() : Coordinate
    {
        return Coordinate::fromString($this->adapterCell->getCoordinate());
    }

    /**
     * {@inheritdoc}
     */
    public function getContent() : string
    {
        return (string) $this->adapterCell->getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function resizeWidth(int $width = null) : CellInterface
    {
        $column = $this->adapterCell->getWorksheet()->getColumnDimension($this->getCoordinate()->x());

        if ($width === null) {
            $column->setAutoSize(true);
            return $this;
        }

        $column->setWidth($width);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function resizeHeight(int $height = null) : CellInterface
    {
        $row = $this->adapterCell->getWorksheet()->getRowDimension($this->getCoordinate()->y());

        if ($height === null) {
            $height = -1;
        }

        $row->setRowHeight($height);
        return $this;
    }
}
