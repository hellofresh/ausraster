<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Font;
use HelloFresh\Ausraster\ColorInterface;
use HelloFresh\Ausraster\Exception\InvalidColorException;

class Color implements ColorInterface
{
    /**
     * Hex representation of colour.
     * @var string
     */
    private $hex = 'ffffff';

    public function __construct(string $hex)
    {
        if (! preg_match('/#?([a-f0-9]{6})/i', $hex)) {
            throw new InvalidColorException;
        }

        $this->hex = str_replace('#', '', $hex);
    }

    public function __toString() : string
    {
        return $this->hex;
    }
}
