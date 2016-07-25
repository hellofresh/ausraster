<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Font;
use HelloFresh\Ausraster\FontInterface;

class Font implements FontInterface
{
    private $adapterFont;

    public function __construct(PHPExcel_Font $adapterFont)
    {
        $this->adapterFont = $adapterFont;
    }

    public function setName(string $name) : FontInterface
    {
        $this->adapterFont->setName($name);
        return $this;
    }

    public function setSize(int $size) : FontInterface
    {
        $this->adapterFont->setSize($size);
        return $this;
    }

    public function setBold(bool $bold) : FontInterface
    {
        $this->adapterFont->setBold($bold);
        return $this;
    }

    public function setItalic(bool $italic) : FontInterface
    {
        $this->adapterFont->setItalic($italic);
        return $this;
    }

    public function setUnderline(bool $underline) : FontInterface
    {
        $this->adapterFont->setUnderline($underline);
        return $this;
    }
}
