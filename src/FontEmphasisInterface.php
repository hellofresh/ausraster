<?php declare(strict_types=1);

namespace HelloFresh\Ausraster;

interface FontEmphasisInterface
{
    /**
     * Set whether the font should be displayed in bold.
     * @param bool $bold
     * @return FontInterface
     */
    public function setBold(bool $bold) : FontInterface;

    /**
     * Get whether the font is bolded.
     * @return bool
     */
    public function isBold() : bool;

    /**
     * Set whether the font should be displayed italicized.
     * @param bool $italic
     * @return FontInterface
     */
    public function setItalic(bool $italic) : FontInterface;

    /**
     * Get whether the font is italicized.
     * @return bool
     */
    public function isItalic() : bool;

    /**
     * Set whether the font should be displayed underlined.
     * @param bool $underline
     * @return FontInterface
     */
    public function setUnderline(bool $underline) : FontInterface;

    /**
     * Get whether the font is underlined.
     * @return bool
     */
    public function isUnderlined() : bool;
}
