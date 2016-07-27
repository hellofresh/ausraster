<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use \Iterator;
use HelloFresh\Ausraster\Spreadsheet\Coordinate;
use HelloFresh\Ausraster\Spreadsheet\CellInterface;
use HelloFresh\Ausraster\Exception\InvalidCellRangeException;

class CoordinateRange implements Iterator
{
    /**
     * Start of range.
     * @var Coordinate
     */
    private $from;

    /**
     * End of range.
     * @var Coordinate
     */
    private $to;

    /**
     * Current X coordinate pointer.
     * @var string
     */
    private $pointerX;

    /**
     * Current Y coordinate pointer
     * @var int
     */
    private $pointerY;

    /**
     * Counter (used as key)
     * @var int
     */
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

    /**
     * Return the counter.
     * @return int
     */
    public function key() : int
    {
        return $counter;
    }

    /**
     * Advance the iterator to the next item.
     */
    public function next()
    {
        ++$this->counter;
        if (++$this->pointerY > $this->to->y()) {
            $this->pointerY = $this->from->y();
            ++$this->pointerX;
        }
    }

    /**
     * Reset the iterator to the start.
     */
    public function rewind()
    {
        $this->counter = 0;
        $this->pointerX = $this->from->x();
        $this->pointerY = $this->from->y();
    }

    /**
     * Check if the iterator should be ended.
     * @return bool
     */
    public function valid() : bool
    {
        return ! ($this->pointerX > $this->to->x());
    }

    /**
     * Get the current item being iterated over.
     * @return Coordinate
     */
    public function current() : Coordinate
    {
        return new Coordinate($this->pointerX, $this->pointerY);
    }
}
