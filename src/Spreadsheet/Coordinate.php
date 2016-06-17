<?php

namespace HelloFresh\Ausraster\Spreadsheet;

class Coordinate
{
    /**
     * @var string
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * Coordinate constructor.
     * @param string $x
     * @param int $y
     */
    public function __construct(string $x, int $y)
    {
        $this->x = strtoupper($x);
        $this->y = $y;
    }

    /**
     * Get the X coordinate.
     * @return string
     */
    public function x() : string
    {
        return $this->x;
    }

    /**
     * Get the Y coordinate.
     * @return int
     */
    public function y() : int
    {
        return $this->y;
    }

    /**
     * Print out the coordinate as a string.
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s%s', $this->x, $this->y);
    }
}
