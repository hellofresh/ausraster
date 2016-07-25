<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use PHPExcel_Font;
use HelloFresh\Ausraster\FontInterface;
use HelloFresh\Ausraster\Spreadsheet\StyleInterface;

class Style implements StyleInterface
{
    /**
     * Cell fill color.
     * @var string
     */
    private $fill = 'ffffff';

    /**
     * Cell font instance.
     * @var Font
     */
    private $font;

    public function __construct()
    {
        $this->font = new Font;
    }

    /**
     * {@inheritdoc}
     */
    public function setFill(string $hex) : StyleInterface
    {
        $this->fill = str_replace('#', '', $hex);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFill() : string
    {
        return $this->fill;
    }

    /**
     * {@inheritdoc}
     */
    public function setFont(FontInterface $font) : StyleInterface
    {
        $this->font = $font;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFont() : FontInterface
    {
        return $this->font;
    }
}
