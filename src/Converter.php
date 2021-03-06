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
    private static function convertThroughDecomposition(int $arabic): string
    {
        $roman = '';
        $map = self::ALGORISMS_MAP;
        $algorismsCount = count($map);
        $arabicNumbers = array_keys($map);
        $romanLetters = array_values($map);

        for ($i = $algorismsCount - 1; $i >= 0 && $arabic > 0; --$i) {
            $currentArabic = $arabicNumbers[$i];
            $division = $arabic / $currentArabic;

            if ($division < 1) {
                continue;
            }

            $currentRoman = $romanLetters[$i];
            $repeat = (int) $division;

            $roman .= 4 === $repeat
                ? $currentRoman.$romanLetters[$i + 1]
                : implode(array_fill(0, $repeat, $currentRoman));

            $arabic -= $repeat * $currentArabic;
        }

        $roman = str_replace('VIV', 'IX', $roman);
        $roman = str_replace('LXL', 'XC', $roman);
        $roman = str_replace('DCD', 'CM', $roman);

        return $roman;
    }
}
