<?php

use PHPUnit\Framework\TestCase;
use ArabicToRoman\Converter;

class ConverterTest extends TestCase
{
    public function testZero()
    {
        $this->assertEquals('', Converter::convert(0));
    }

    /**
     * @dataProvider oneAlgorismNumbers
     */
    public function testOneAlgorismNumber($arabic, $roman)
    {
        $this->assertEquals($roman, Converter::convert($arabic));
    }

    public function oneAlgorismNumbers()
    {
        return [
            [1, 'I'],
            [5, 'V'],
            [10, 'X'],
            [50, 'L'],
            [100, 'C'],
            [1000, 'M'],
        ];
    }
}
