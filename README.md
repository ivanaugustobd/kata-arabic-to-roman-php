# Kata - Conversor of arabic numbers into roman algarisms (PHP/OO version)
## Installation
```sh
git clone https://gitlab.com/ivanaugustobd/kata-arabic-to-roman-php.git; cd kata-arabic-to-roman-php; composer install
```
## Usage
```sh
php index.php <number> # where number is any number between 0 and 3999
```
## Examples
```sh
> php index.php 8
VIII
> php index.php 73
LXXIII
> php index.php 358
CCCLVIII
> php index.php 783
DCCLXXXIII
> php index.php 2378
MMCCCLXXVIII
> php index.php 3587
MMMDLXXXVII
```
## Runing the tests
```sh
vendor/bin/phpunit tests
```
