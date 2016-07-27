<?php declare(strict_types=1);

use HelloFresh\Ausraster\Spreadsheet\Coordinate;

class CoordinateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validProvider
     */
    public function testCreatingCoordinate($x, $y)
    {
        $coordinate = new Coordinate($x, $y);

        $x = strtoupper($x);

        $this->assertEquals($x, $coordinate->x());
        $this->assertEquals($y, $coordinate->y());
        $this->assertEquals($x . $y, (string) $coordinate);
    }

    /**
     * @dataProvider invalidProvider
     * @expectedException HelloFresh\Ausraster\Exception\InvalidCoordinateException
     */
    public function testCreatingInvalidCoordinate($x, $y)
    {
        $coordinate = new Coordinate($x, $y);

        $x = strtoupper($x);

        $this->assertEquals($x, $coordinate->x());
        $this->assertEquals($y, $coordinate->y());
        $this->assertEquals($x . $y, (string) $coordinate);
    }

    /**
     * @dataProvider validProvider
     */
    public function testCreatingCoordinateFromString($x, $y)
    {
        $coordinate = Coordinate::fromString($x . $y);

        $x = strtoupper($x);

        $this->assertEquals($x, $coordinate->x());
        $this->assertEquals($y, $coordinate->y());
        $this->assertEquals($x . $y, (string) $coordinate);
    }

    /**
     * @dataProvider invalidProvider
     * @expectedException HelloFresh\Ausraster\Exception\InvalidCoordinateException
     */
    public function testCreatingInvalidCoordinateFromString($x, $y)
    {
        Coordinate::fromString($x . $y);
    }

    public function validProvider()
    {
        return [
            [ 'A', 1 ],
            [ 'a', 1 ],
            [ 'C', 10 ],
            // [ 'JJ', 999 ]
        ];
    }

    public function invalidProvider()
    {
        return [
            [ 'A', 0 ],
            // [ 'A', '1' ],
            [ 'A', -1 ],
            [ 'A', 0.8 ],
            [ '💩' , 1 ],
            [ 'A', 'A' ],
            [ '漢字', 1 ],
            [ ')', 1 ],
            [ 'A', ')' ],
            [ 0, 1 ],
            [ 1, 1 ],
            [ -1, 1 ]
        ];
    }
}
