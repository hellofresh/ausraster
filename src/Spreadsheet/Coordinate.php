<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\Exception\InvalidCoordinateException;

final class Coordinate
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
    public function __construct($x, $y)
    {
        $this->validateCoordinates($x, $y);

        $this->x = strtoupper($x);
        $this->y = $y;
    }

    /**
     * Named constructor to build a Coordinate from a string
     * @param  string $coordinate e.g. A1
     * @return Coordinate
     */
    public static function fromString(string $coordinate) : Coordinate
    {
        $coords = preg_split('/(?=\d)/', $coordinate, 2);

        if (! isset($coords[1])) {
            throw new InvalidCoordinateException();
        }

        return new Coordinate($coords[0], (int) $coords[1]);
    }

    /**
     * Print out the coordinate as a string.
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s%s', $this->x(), $this->y());
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
     * Compare a provided coordinate against this one.
     * @param  Coordinate $comparison
     * @return int      Uses standard <=> style return values.
     */
    public function compareTo(Coordinate $comparison) : int
    {
        if ($comparison->x() < $this->x() || $comparison->y() < $this->y()) {
            return -1;
        }

        if ($comparison->x() > $this->x() || $comparison->y() > $this->y()) {
            return 1;
        }

        return 0;
    }

    private function validateCoordinates($x, $y)
    {
        try {
            $this->validateX($x);
            $this->validateY($y);
        } catch (\Error $e) {
            throw new InvalidCoordinateException();
        }
    }

    private function validateX(string $x)
    {
        if (! ctype_alpha($x) && strlen($x) !== 1) {
            throw new InvalidCoordinateException();
        }
    }

    private function validateY(int $y)
    {
        if (! filter_var($y, FILTER_VALIDATE_INT) || $y < 1) {
            throw new InvalidCoordinateException();
        }
    }
}
