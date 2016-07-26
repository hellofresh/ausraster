<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet;

use HelloFresh\Ausraster\Font;
use HelloFresh\Ausraster\FontInterface;
use HelloFresh\Ausraster\ColorInterface;
use HelloFresh\Ausraster\Spreadsheet\PHPExcel\Color;

class Style implements StyleInterface
{
    /**
     * Cell fill color.
     * @var string
     */
    private $fill;

    /**
     * Cell font instance.
     * @var Font
     */
    private $font;

    public function __construct()
    {
        $this->font = new Font();
    }

    /**
     * {@inheritdoc}
     */
    public function setFill(ColorInterface $color = null) : StyleInterface
    {
        $this->fill = $color;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFill()
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
