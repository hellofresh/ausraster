<?php declare(strict_types = 1);

namespace HelloFresh\Ausraster\Spreadsheet;

/**
 * Class CoordinateRange
 */
class CoordinateRange
{
    /**
     * @var Coordinate
     */
    private $from;

    /**
     * @var Coordinate
     */
    private $to;

    /**
     * CoordinateRange constructor.
     *
     * @param Coordinate $from
     * @param Coordinate $to
     */
    public function __construct(Coordinate $from, Coordinate $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return Coordinate
     */
    public function from(): Coordinate
    {
        return $this->from;
    }

    /**
     * @return Coordinate
     */
    public function to(): Coordinate
    {
        return $this->to;
    }

    /**
     * Print out both coordinates range as a string.
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s:%s', $this->from(), $this->to());
    }
}
