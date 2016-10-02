<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\Spreadsheet\StyleInterface;

interface StylableInterface
{
    /**
     * Replace the cell's style with the rules from the provided Style object.
     * @param  StyleInterface $style
     * @return StylableInterface
     */
    public function style(StyleInterface $style) : StylableInterface;

    /**
     * Resize the width of the cell.
     * @param int|null $width - null sets the width to autoresize.
     * @return StylableInterface
     * @deprecated because this is a hack until next major version gets Row and Column objects
     */
    public function resizeWidth(int $width = null) : StylableInterface;

    /**
     * Resize the height of the cell.
     * @param int|null $width - null sets the height back to default
     * @return StylableInterface
     * @deprecated because this is a hack until next major version gets Row and Column objects
     */
    public function resizeHeight(int $height = null) : StylableInterface;
}
