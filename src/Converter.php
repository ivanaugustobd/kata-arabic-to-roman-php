<?php

namespace ArabicToRoman;

class Converter
{
    const ALGORISMS_MAP = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        1000 => 'M',
    ];

    /**
     * Convert given arabic number into roman equivalent
     *
     * @param int $arabic Arabic number to be converted
     * @return string Roman algorism
     */
    public static function convert(int $arabic) : string
    {
        if ($arabic === 0) {
            return '';
        }

        if (isset(self::ALGORISMS_MAP[$arabic])) {
            return self::ALGORISMS_MAP[$arabic];
        }
    }
}
