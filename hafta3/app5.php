<?php

class Sayi
{
    public $sayi;

    public function __construct($sayi)
    {
        $this->sayi = $sayi;
    }

    public static $islemAdeti = 0;

    public function topla($sayi2)
    {
        self::$islemAdeti++;
        return $this->sayi + $sayi2;
    }

}

echo "Yapılmış olan işlem adeti: ".Sayi::$islemAdeti.PHP_EOL;
$sayi1 = new Sayi(10);
echo "10 + 5 = ".$sayi1->topla(5).PHP_EOL;
$sayi2 = new Sayi(12);
echo "12 + 3 = ".$sayi2->topla(3).PHP_EOL;
echo "Yapılmış olan işlem adeti: ".Sayi::$islemAdeti.PHP_EOL;