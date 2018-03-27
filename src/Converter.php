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
        500 => 'D',
        1000 => 'M',
    ];

    /**
     * Convert given arabic number into roman equivalent
     *
     * @param int $arabic Arabic number to be converted
     *
     * @return string Roman algorism
     */
    public static function convert(int $arabic) : string
    {
        if ($arabic === 0) {
            return '';
        }

        $map = self::ALGORISMS_MAP;

        if (isset($map[$arabic])) {
            return $map[$arabic];
        }

        foreach (array_reverse($map, true) as $mapArabic => $mapRoman) {
            $division = $arabic / $mapArabic;

            if ($division > 1) {
                $repeat = (int) $division;
                $result = '';

                for ($i = 0; $i < $repeat; $i++) {
                    $result .= $mapRoman;
                }

                return $result;
            }
        }

        return 'Whoops, some error has occurred! :P';
    }
}
