<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use \Iterator;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Exception\InvalidCellRangeException;

class CoordinateRange implements Iterator
{
    private $from;

    private $to;

    private $pointerX;

    private $pointerY;

    private $counter = 0;

    public function __construct(Coordinate $from, Coordinate $to)
    {
        if ($from->compareTo($to) !== 1) {
            throw new InvalidCellRangeException();
        }

        $this->from = $from;
        $this->to = $to;

        $this->rewind();
    }

    public function key() : int
    {
        return $counter;
    }

    public function next()
    {
        ++$this->counter;
        if (++$this->pointerY > $this->to->y()) {
            $this->pointerY = $this->from->y();
            ++$this->pointerX;
        }
    }

    public function rewind()
    {
        $this->counter = 0;
        $this->pointerX = $this->from->x();
        $this->pointerY = $this->from->y();
    }

    public function valid() : bool
    {
        return ! ($this->pointerX > $this->to->x());
    }

    public function current() : Coordinate
    {
        return new Coordinate($this->pointerX, $this->pointerY);
    }
}
