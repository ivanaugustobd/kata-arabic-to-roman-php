<?php

use PHPUnit\Framework\TestCase;
use ArabicToRoman\Converter;

class ConverterTest extends TestCase
{
    public function testZero()
    {
        $this->assertEquals('', Converter::convert(0));
    }
}
