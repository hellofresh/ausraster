<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\FontInterface;
use HelloFresh\Ausraster\ColorInterface;

interface StyleInterface
{
    /**
     * Set the background fill.
     * @param ColorInterface $color
     * @TODO Replace with Color object
     */
    public function setFill(ColorInterface $color) : StyleInterface;

    /**
     * Get the background fill.
     * @return ColorInterface
     * @TODO Replace with Color object
     */
    public function getFill() : ColorInterface;

    /**
     * Set the font.
     * @param FontInterface $font
     */
    public function setFont(FontInterface $font) : StyleInterface;

    /**
     * Get the font
     * @return FontInterface
     */
    public function getFont() : FontInterface;
}
