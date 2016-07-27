<?php declare(strict_types=1);

namespace HelloFresh\Ausraster;

interface FontInterface
{
    /**
     * Set the font to use.
     * @param string $name
     * @return FontInterface
     */
    public function setName(string $name) : FontInterface;

    /**
     * Get the typeface name.
     * @return string
     */
    public function getName() : string;

    /**
     * Set the font size.
     * @param int $size
     * @return FontInterface
     */
    public function setSize(int $size) : FontInterface;

    /**
     * Get the font size.
     * @return int
     */
    public function getSize() : int;

    /**
     * Set the font color.
     * @param ColorInterface $color
     * @return FontInterface
     */
    public function setColor(ColorInterface $color) : FontInterface;

    /**
     * Get the font color.
     * @return ColorInterface
     */
    public function getColor() : ColorInterface;
}
