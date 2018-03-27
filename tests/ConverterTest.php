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

    /**
     * @dataProvider twoAndThreeAlgorismsNumbers
     */
    public function testTwoAndThreeAlgorisms($arabic, $roman)
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
            [500, 'D'],
            [1000, 'M'],
        ];
    }

    public function twoAndThreeAlgorismsNumbers()
    {
        return [
            [2, 'II'],
            [3, 'III'],
            [20, 'XX'],
            [30, 'XXX'],
            [200, 'CC'],
            [300, 'CCC'],
            [2000, 'MM'],
            [3000, 'MMM'],
        ];
    }
}
