<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Font;
use HelloFresh\Ausraster\FontInterface;
use HelloFresh\Ausraster\Spreadsheet\StyleInterface;

class Style implements StyleInterface
{
    private $fill = 'ffffff';

    private $font;

    public function __construct()
    {
        $this->font = new Font;
    }

    public function setFill(string $hex) : StyleInterface
    {
        $this->fill = str_replace('#', '', $hex);
        return $this;
    }

    public function getFill() : string
    {
        return $this->fill;
    }

    public function setFont(FontInterface $font) : StyleInterface
    {
        $this->font = $font;
        return $this;
    }

    public function getFont() : FontInterface
    {
        return $this->font;
    }
}
