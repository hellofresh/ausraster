<?php declare(strict_types=1);

namespace HelloFresh\Ausraster;

interface ColorInterface
{
    /**
     * Return ARGB representation of the colour.
     * @return string
     */
    public function __toString() : string;

    /**
     * Change the alpha channel of the color.
     * @param  int    $opacity from 0-255
     * @return ColorInterface
     */
    public function changeOpacity(int $opacity) : ColorInterface;
}
