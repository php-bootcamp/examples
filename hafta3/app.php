<?php

class Deneme
{
    const Isim = "Isim sabitinin değeri";

    static $isim = "isim static değeri";

    /*
     * public = herkes tarafından erişilebilir
     * protected = sınıf içerisinden veya alt sınıflar tarafından erişilebilir
     * private = sadece sınıf içerisinden erişilebilir
     */
    public $yas = 25;
    protected $dersler = ["PHP", "MySQL", "MongoDB"];
    private $soyisim = "Deneme";

    public function kimsinSen() {
        echo "Sabit İsim:".self::Isim;
        echo "Yaş:".$this->yas;
        print_r($this->dersler);
        echo "Soyisim:".$this->soyisim;

        Deneme::deneme();
        self::deneme();
    }
}

/*
$eray = new Deneme;
$eray->yas = 30;
$eray->kimsinSen();

$orkun = new Deneme;
$orkun->yas = 25;
$orkun->kimsinSen();
*/