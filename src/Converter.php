<?php

namespace ArabicToRoman;

class Converter
{
    /**
     * Convert given arabic number into roman equivalent
     *
     * @param int $arabicNumber Arabic number to be converted
     * @return string Roman algorism
     */
    public static function convert(int $arabicNumber) : string
    {
        if ($arabicNumber === 0) {
            return '';
        }
    }
}
