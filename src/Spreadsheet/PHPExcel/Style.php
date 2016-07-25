<?php declare(strict_types = 1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use HelloFresh\Ausraster\Spreadsheet\StyleInterface;

/**
 * Class Style
 */
class Style implements StyleInterface
{
    private $adapterStyle;

    /**
     * Style constructor.
     *
     * @param \PHPExcel_Style $adapterStyle
     */
    public function __construct(\PHPExcel_Style $adapterStyle)
    {
        $this->adapterStyle = $adapterStyle;
    }

    /**
     * {@inheritdoc}
     */
    public function applyFromArray(array $style)
    {
        return $this->adapterStyle->applyFromArray($style);
    }
}
