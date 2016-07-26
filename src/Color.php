<?php declare(strict_types=1);

namespace HelloFresh\Ausraster;

use PHPExcel_Font;
use HelloFresh\Ausraster\ColorInterface;
use HelloFresh\Ausraster\Exception\InvalidColorException;

final class Color implements ColorInterface
{
    const MIN_OPACITY = 0;
    const MAX_OPACITY = 255;

    const BLACK = '#000000';
    const WHITE = '#FFFFFF';

    /**
     * Hex representation of colour.
     * @var string
     */
    private $hex;

    /**
     * Colour opacity (0-255)
     * @var string
     */
    private $opacity;

    public function __construct(string $hex, int $opacity = self::MAX_OPACITY)
    {
        if (! preg_match('/#?([a-f0-9]{6})/i', $hex) || $opacity < self::MIN_OPACITY || $opacity > self::MAX_OPACITY) {
            throw new InvalidColorException();
        }

        $this->hex = str_replace('#', '', $hex);
        $this->opacity = $opacity;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString() : string
    {
        return sprintf('%s%s', dechex($this->opacity), $this->hex);
    }

    /**
     * {@inheritdoc}
     */
    public function changeOpacity(int $opacity) : ColorInterface
    {
        if ($opacity < self::MIN_OPACITY || $opacity > self::MAX_OPACITY) {
            throw new InvalidColorException();
        }

        $this->opacity = $opacity;
        return $this;
    }
}
