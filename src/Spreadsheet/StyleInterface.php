<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\FontInterface;

interface StyleInterface
{
    public function setFill(string $hex) : StyleInterface;

    public function getFill() : string;

    public function setFont(FontInterface $font) : StyleInterface;

    public function getFont() : FontInterface;
}
