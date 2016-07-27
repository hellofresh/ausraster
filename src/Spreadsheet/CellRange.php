<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use \Iterator;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Spreadsheet\WorksheetInterface;
use HelloFresh\Ausraster\Exception\InvalidCellRangeException;

class CellRange implements Iterator
{
    private $worksheet;

    private $from;

    private $to;

    private $pointerX;

    private $pointerY;

    public function __construct(WorksheetInterface $worksheet, Coordinate $from, Coordinate $to)
    {
        if ($from->compareTo($to) !== 1) {
            throw new InvalidCellRangeException();
        }

        $this->worksheet = $worksheet;

        $this->from = $from;
        $this->to = $to;

        $this->rewind();
    }

    public function key()
    {
        return new Coordinate($this->pointerX, $this->pointerY);
    }

    public function next()
    {
        if (++$this->pointerY > $this->to->y()) {
            $this->pointerY = $this->from->y();
            ++$this->pointerX;
        }
    }

    public function rewind()
    {
        $this->pointerX = $this->from->x();
        $this->pointerY = $this->from->y();
    }

    public function valid()
    {
        return ! ($this->pointerX > $this->to->x());
    }

    public function current() : CellInterface
    {
        return $this->worksheet->getCellAt(new Coordinate($this->pointerX, $this->pointerY));
    }
}
