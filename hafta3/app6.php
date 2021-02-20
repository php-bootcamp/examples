<?php

include "app7.php";

class Sayi
{
    use Hesaplar;

    public $sayi;

    public function __construct($sayi)
    {
        $this->sayi = $sayi;
    }

    public function ekle($sayi2)
    {
        $this->sayi += $sayi2;
        return $this;
    }

    public function carp($sayi2)
    {
        $this->sayi *= $sayi2;
        return $this;
    }
}

$sayi = new Sayi(5);
$sonuc = $sayi->ekle(2)->carp(4);

echo "(5+2)*4=".$sonuc->sayi;