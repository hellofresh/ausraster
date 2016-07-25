<?php
declare(strict_types=1);

namespace HelloFresh\Ausraster;

interface FontInterface
{
    public function setName(string $name) : FontInterface;

    public function setSize(int $size) : FontInterface;

    public function setBold(bool $bold) : FontInterface;

    public function setItalic(bool $italic) : FontInterface;

    public function setUnderline(bool $underline) : FontInterface;
}
