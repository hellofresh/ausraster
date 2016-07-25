<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\Exception\InvalidCoordinateException;

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
    public function __construct($x, $y)
    {
        $this->validateCoordinates($x, $y);

        $this->x = strtoupper($x);
        $this->y = $y;
    }

    public static function fromString(string $coordinate) : Coordinate
    {
        $coords = preg_split('/(?=\d)/', $coordinate, 2);

        if (! isset($coords[1])) {
            throw new InvalidCoordinateException;
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

    private function validateCoordinates($x, $y)
    {
        try {
            $this->validateX($x);
            $this->validateY($y);
        } catch (\Error $e) {
            throw new InvalidCoordinateException;
        }
    }

    private function validateX(string $x)
    {
        if (! ctype_alpha($x)) {
            throw new InvalidCoordinateException;
        }
    }

    private function validateY(int $y)
    {
        if (! filter_var($y, FILTER_VALIDATE_INT) || $y < 1) {
            throw new InvalidCoordinateException;
        }
    }
}
