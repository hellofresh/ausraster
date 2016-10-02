<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\CSV;

use League\Csv\AbstractCsv;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;

class Cell implements CellInterface
{
    /**
     * League/CSV instance
     * @var AbstractCSV
     */
    private $document;

    /**
     * The coordinate of this Cell
     * @var Coordinate
     */
    private $coordinate;

    /**
     * Cached content
     * @var string
     */
    private $content;

    public function __construct(AbstractCsv $document, Coordinate $coordinate)
    {
        $this->document = $document;
        $this->coordinate = $coordinate;
    }

    private function getRow() : array
    {
        return $this->document->newReader()->fetchOne($this->coordinate->y() - 1);
    }

    public function getContent() : string
    {
        if ($this->content) {
            return $this->content;
        }

        $row = $this->getRow();

        if (count($row) < $this->coordinate->xNumber()) {
            return (string) null;
        }

        return $row[$this->coordinate->xNumber() - 1];
    }

    public function fill(string $content) : CellInterface
    {
        $this->content = $content;

        return $this;
    }

    public function getCoordinate() : Coordinate
    {
        return $this->coordinate;
    }
}
