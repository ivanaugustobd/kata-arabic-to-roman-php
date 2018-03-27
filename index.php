<?php

require __DIR__ . '/vendor/autoload.php';

if (!isset($argv[1])) {
    echo 'Usage: php index.php <arabic_number>' . PHP_EOL;
    exit(1);
}

$arabicNumber = $argv[1];

echo ArabicToRoman\Converter::convert($arabicNumber) . PHP_EOL;

exit(0);
