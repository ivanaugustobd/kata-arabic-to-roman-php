<?php

namespace ArabicToRoman;

class Converter
{
    const ALGORISMS_MAP = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    /**
     * Convert given arabic number into roman equivalent.
     *
     * @param int $arabic Number to be
     *
     * @return string Roman algorism
     */
    public static function convert(int $arabic): string
    {
        if (0 === $arabic) {
            return '';
        }

        $map = self::ALGORISMS_MAP;

        if (isset($map[$arabic])) {
            return $map[$arabic];
        }

        return self::convertThroughDecomposition($arabic);
    }

    /**
     * Get roman equivalent by looking from the major to the minor divisible value possible.
     *
     * @param int $arabic Number to be
     *
     * @return string Roman algorism
     */
    private static function convertThroughDecomposition(int $arabic)
    {
        $map = self::ALGORISMS_MAP;
        $roman = '';
        $romanLetters = array_values($map);

        while ($arabic > 0) {
            foreach ($map as $mapArabic => $mapRoman) {
                $division = $arabic / $mapArabic;

                if ($division < 1) {
                    continue;
                }

                $repeat = (int) $division;
                $unitsToDecrease = $repeat * $mapArabic;

                if (4 === $repeat) {
                    $roman .= $mapRoman.$romanLetters[array_search($mapRoman, $romanLetters) - 1];
                    $arabic -= $unitsToDecrease;

                    continue;
                }

                for ($i = 0; $i < $repeat; ++$i) {
                    $roman .= $mapRoman;
                }

                $arabic -= $unitsToDecrease;
            }
        }

        $roman = str_replace('VIV', 'IX', $roman);
        $roman = str_replace('LXL', 'XC', $roman);
        $roman = str_replace('DCD', 'CM', $roman);

        return $roman;
    }
}
