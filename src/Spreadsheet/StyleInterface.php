<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\FontInterface;

interface StyleInterface
{
    /**
     * Set the background fill.
     * @param string $hex
     * @TODO Replace with Color object
     */
    public function setFill(string $hex) : StyleInterface;

    /**
     * Get the background fill.
     * @return string
     * @TODO Replace with Color object
     */
    public function getFill() : string;

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
