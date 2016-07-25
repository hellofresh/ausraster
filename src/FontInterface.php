<?php
declare(strict_types=1);

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
     * Set the font size.
     * @param int $size
     * @return FontInterface
     */
    public function setSize(int $size) : FontInterface;

    /**
     * Set whether the font should be displayed in bold.
     * @param bool $bold
     * @return FontInterface
     */
    public function setBold(bool $bold) : FontInterface;

    /**
     * Set whether the font should be displayed italicized.
     * @param bool $italic
     * @return FontInterface
     */
    public function setItalic(bool $italic) : FontInterface;

    /**
     * Set whether the font should be displayed underlined.
     * @param bool $underline
     * @return FontInterface
     */
    public function setUnderline(bool $underline) : FontInterface;

    /**
     * Get the typeface name.
     * @return string
     */
    public function getName() : string;

    /**
     * Get the font size.
     * @return int
     */
    public function getSize() : int;

    /**
     * Get whether the font is bolded.
     * @return bool
     */
    public function getBold() : bool;

    /**
     * Get whether the font is italicized.
     * @return bool
     */
    public function getItalic() : bool;

    /**
     * Get whether the font is underlined.
     * @return bool
     */
    public function getUnderline() : bool;

}
