<?php

use PHPUnit\Framework\TestCase;
use ArabicToRoman\Converter;

class ConverterTest extends TestCase
{
    public function testZero()
    {
        $converter = new Converter(0);

        $this->assertEquals('', $converter->convert());
    }

    /**
     * @dataProvider oneAlgorismNumbers
     */
    public function testOneAlgorismNumber($arabic, $roman)
    {
        $converter = new Converter($arabic);

        $this->assertEquals($roman, $converter->convert());
    }

    /**
     * @dataProvider twoAndThreeAlgorismsNumbers
     */
    public function testTwoAndThreeAlgorisms($arabic, $roman)
    {
        $converter = new Converter($arabic);

        $this->assertEquals($roman, $converter->convert());
    }

    /**
     * @dataProvider hasFourNumbers
     */
    public function testhasFourNumber($arabic, $roman)
    {
        $converter = new Converter($arabic);

        $this->assertEquals($roman, $converter->convert());
    }

    /**
     * @dataProvider noSubtrationRequiredNumbers
     */
    public function testNoSubtrationRequiredAlgorisms($arabic, $roman)
    {
        $converter = new Converter($arabic);

        $this->assertEquals($roman, $converter->convert());
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

    public function noSubtrationRequiredNumbers()
    {
        return [
            [137, 'CXXXVII'],
            [358, 'CCCLVIII'],
            [783, 'DCCLXXXIII'],
            [888, 'DCCCLXXXVIII'],
            [1562, 'MDLXII'],
            [2378, 'MMCCCLXXVIII'],
            [3587, 'MMMDLXXXVII'],
        ];
    }

    public function hasFourNumbers()
    {
        return [
            [134, 'CXXXIV'],
            [348, 'CCCXLVIII'],
            [483, 'CDLXXXIII'],
            [848, 'DCCCXLVIII'],
            [1462, 'MCDLXII'],
            [2474, 'MMCDLXXIV'],
            [3444, 'MMMCDXLIV'],
        ];
    }
}
