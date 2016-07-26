<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\FontInterface;
use HelloFresh\Ausraster\ColorInterface;

interface StyleInterface
{
    /**
     * Set the background fill.
     * @param ColorInterface|null $color
     */
    public function setFill(ColorInterface $color = null) : StyleInterface;

    /**
     * Get the background fill.
     * @return ColorInterface|null
     */
    public function getFill();

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
