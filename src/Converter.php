<?php

namespace ArabicToRoman;

class Converter
{
    private $arabic;
    private $roman = '';

    const ALGORISMS_MAP = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M',
    ];

    public function __construct(int $arabic)
    {
        $this->arabic = $arabic;
    }

    /**
     * Convert given arabic number into roman equivalent
     *
     * @return string Roman algorism
     */
    public function convert() : string
    {
        if ($this->arabic === 0) {
            return '';
        }

        $map = self::ALGORISMS_MAP;
        $romanLetters = array_values(self::ALGORISMS_MAP);

        if (isset($map[$this->arabic])) {
            return $map[$this->arabic];
        }

        while ($this->arabic > 0) {
            foreach (array_reverse($map, true) as $mapArabic => $mapRoman) {
                $division = $this->arabic / $mapArabic;

                if ($division < 1) {
                    continue;
                }

                $repeat = (int) $division;

                if ($repeat === 4) {
                    $this->roman .= $mapRoman . $romanLetters[array_search($mapRoman, $romanLetters) + 1];
                } else {
                    for ($i = 0; $i < $repeat; $i++) {
                        $this->roman .= $mapRoman;
                    }
                }

                $this->arabic -= $repeat * $mapArabic;
            }
        }

        $this->roman = str_replace('VIV', 'IX', $this->roman);
        $this->roman = str_replace('LXL', 'XC', $this->roman);
        $this->roman = str_replace('DCD', 'CM', $this->roman);

        return $this->roman;
    }
}
