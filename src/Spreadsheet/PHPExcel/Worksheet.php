<?php

namespace HelloFresh\Ausraster\Spreadsheet\PhpExcel;

class Worksheet implements WorksheetInterface
{
    private $name;

    public function __construct()
    {
        $this->name = (string) base_convert(microtime(), 10, 36);
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
    public function changeName(string $name) : WorksheetInterface
    {
        $this->name = $name;
        return $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getCellAt(Coordinate $coordinate) : CellInterface
    {

    }
}
