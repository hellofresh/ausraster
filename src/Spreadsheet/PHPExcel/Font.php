<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Spreadsheet\PHPExcel;

use HelloFresh\Ausraster\FontInterface;
use HelloFresh\Ausraster\ColorInterface;

class Font implements FontInterface
{
    /**
     * Typeface name.
     * @var string
     */
    private $name = 'Calibri';

    /**
     * Font size.
     * @var int
     */
    private $size = 12;

    /**
     * Font bold status.
     * @var bool
     */
    private $bold = false;

    /**
     * Font italic status.
     * @var bool
     */
    private $italic = false;

    /**
     * Font underline status.
     * @var bool
     */
    private $underline = false;

    /**
     * Font color.
     * @var ColorInterface
     */
    private $color;

    /**
     * {@inheritdoc}
     */
    public function setName(string $name) : FontInterface
    {
        $this->name = $name;
        $this->color = new Color(Color::BLACK);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setSize(int $size) : FontInterface
    {
        $this->size = $size;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize() : int
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function setBold(bool $bold) : FontInterface
    {
        $this->bold = $bold;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBold() : bool
    {
        return $this->bold;
    }

    /**
     * {@inheritdoc}
     */
    public function setItalic(bool $italic) : FontInterface
    {
        $this->italic = $italic;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getItalic() : bool
    {
        return $this->italic;
    }

    /**
     * {@inheritdoc}
     */
    public function setUnderline(bool $underline) : FontInterface
    {
        $this->underline = $underline;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnderline() : bool
    {
        return $this->underline;
    }

    /**
     * {@inheritdoc}
     */
    public function setColor(ColorInterface $color) : FontInterface
    {
        $this->color = $color;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getColor() : ColorInterface
    {
        return $this->color;
    }
}
