<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Font;
use HelloFresh\Ausraster\FontInterface;

class Font implements FontInterface
{
    private $name = 'Calibri';

    private $size = 12;

    private $bold = false;

    private $italic = false;

    private $underline = false;

    private $color = '000000';

    public function setName(string $name) : FontInterface
    {
        $this->name = $name;
        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setSize(int $size) : FontInterface
    {
        $this->size = $size;
        return $this;
    }

    public function getSize() : int
    {
        return $this->size;
    }

    public function setBold(bool $bold) : FontInterface
    {
        $this->bold = $bold;
        return $this;
    }

    public function getBold() : bool
    {
        return $this->bold;
    }

    public function setItalic(bool $italic) : FontInterface
    {
        $this->italic = $italic;
        return $this;
    }

    public function getItalic() : bool
    {
        return $this->italic;
    }

    public function setUnderline(bool $underline) : FontInterface
    {
        $this->underline = $underline;
        return $this;
    }

    public function getUnderline() : bool
    {
        return $this->underline;
    }

    public function setColor(string $hex) : FontInterface
    {
        $this->color = str_replace('#', '', $hex);
        return $this;
    }

    public function getColor() : string
    {
        return $this->color;
    }
}
