<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

interface CellInterface
{
    /**
     * Replace the cell's content with the provided string.
     * @param string $content
     * @return CellInterface
     */
    public function fill(string $content) : CellInterface;

    /**
     * Replace the cell's style with the rules from the provided Style object.
     * @param  StyleInterface $style
     * @return CellInterface
     */
    public function style(StyleInterface $style) : CellInterface;

    /**
     * Get the cell's coordinates.
     * @return Coordinate
     */
    public function getCoordinate() : Coordinate;

    /**
     * Get the cell's content.
     * @return string
     */
    public function getContent() : string;

    /**
     * Resize the width of the cell.
     * @param int|null $width - null sets the width to autoresize.
     * @return CellInterface
     * @deprecated because this is a hack until next major version gets Row and Column objects
     */
    public function resizeWidth(int $width = null) : CellInterface;

    /**
     * Resize the height of the cell.
     * @param int|null $width - null sets the height back to default
     * @return CellInterface
     * @deprecated because this is a hack until next major version gets Row and Column objects
     */
    public function resizeHeight(int $height = null) : CellInterface;
}
