<?php

class Insan
{
    private $boy;
    private $kilo;
    private $yas;
    private $isim;
    private $soyisim;

    public function __construct($isim, $soyisim, $yas = 30, $boy = 130, $kilo = 50)
    {
        $this->isim = $isim;
        $this->soyisim = $soyisim;
        $this->boy = $boy;
        $this->kilo = $kilo;
        $this->yas = $yas;

        echo "Yeni bir ".$isim." ".$soyisim." insan nesnesi üretiliyor...\n";
    }

    public function __destruct()
    {
        echo $this->isim." nesnesi yok ediliyor...";
    }

    public function tanimla($yas, $kilo, $boy)
    {
        $this->yas = $yas;
        $this->boy = $boy;
        $this->kilo = $kilo;
    }

    public function anlat()
    {
        echo "İsim: ".$this->isim."\n";
        echo "Soyisim: ".$this->soyisim."\n";
        echo "Boy: ".$this->boy."\n";
        echo "Kilo: ".$this->kilo."\n";
        echo "Yaş: ".$this->yas."\n";
    }
}

$eray = new Insan("Eray", "Aydın");

$orkun = new Insan("Orkun", "Çakılkaya", 24, 130, 20);

$vedat = new Insan("Vedat", "Kurtay");

$eray->anlat();
unset($eray);
echo "---".PHP_EOL;
$orkun->anlat();
echo "---".PHP_EOL;
$vedat->anlat();
