<?php

trait Hesaplar
{
    public function ekle($sayi1, $sayi2)
    {
        return $sayi1 + $sayi2;
    }

    public function cikar($sayi1, $sayi2)
    {
        return $sayi1 - $sayi2;
    }
}