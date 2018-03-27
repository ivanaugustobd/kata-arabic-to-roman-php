<?php

require __DIR__ . '/vendor/autoload.php';

if (!isset($argv[1])) {
    echo 'Usage: php index.php <arabic_number>' . PHP_EOL;
    exit(1);
}

$arabicNumber = $argv[1];
$converter = new ArabicToRoman\Converter($arabicNumber);

echo $converter->convert() . PHP_EOL;

exit(0);
