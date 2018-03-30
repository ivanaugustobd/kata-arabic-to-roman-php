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
    private static function convertThroughDecomposition(int $arabic)
    {
        $roman = '';
        $map = self::ALGORISMS_MAP;
        $algorimsCount = count($map);
        $arabicNumbers = array_keys($map);
        $romanLetters = array_values($map);

        for ($i = $algorimsCount - 1; $i >= 0 && $arabic > 0; $i--) {
            $currentArabic = $arabicNumbers[$i];
            $currentRoman = $romanLetters[$i];
            $division = $arabic / $currentArabic;

            if ($division < 1) {
                continue;
            }

            $repeat = (int) $division;
            $unitsToDecrease = $repeat * $currentArabic;

            if ($repeat === 4) {
                $roman .= $currentRoman.$romanLetters[$i + 1];
                $arabic -= $unitsToDecrease;

                continue;
            }

            $roman .= self::repeatRomanLetter($currentRoman, $repeat);

            $arabic -= $unitsToDecrease;
        }

        $roman = str_replace('VIV', 'IX', $roman);
        $roman = str_replace('LXL', 'XC', $roman);
        $roman = str_replace('DCD', 'CM', $roman);

        return $roman;
    }

    /**
     * Repeat given letter n times.
     *
     * @param string $letter Letter to be repeated
     * @param int    $times  Times to be repeated
     *
     * @return string Repeated letters string
     */
    private static function repeatRomanLetter($letter, $times)
    {
        $letters = '';

        for ($i = 0; $i < $times; ++$i) {
            $letters .= $letter;
        }

        return $letters;
    }
}
