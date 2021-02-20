<?php

class CanliVarlik
{
    protected $yasiyorMu;

    public function __construct($yasiyorMu = true)
    {
        $this->yasiyorMu = $yasiyorMu;
    }

    public final function oldur()
    {
        $this->yasiyorMu = false;
    }

    private function kontrolEt() {
        return $this->yasiyorMu;
    }
}

class Insan extends CanliVarlik
{
    protected $isim;
    protected $soyisim;
    protected $yas;

    public function __construct($isim, $soyisim, $yas = 20, $yasiyorMu = true)
    {
        $this->isim = $isim;
        $this->soyisim = $soyisim;
        $this->yas = $yas;

        parent::__construct($yasiyorMu);
    }

    public function anlat()
    {
        echo "Merhaba, ben ".$this->isim." ".$this->soyisim.PHP_EOL;

        if (!$this->yasiyorMu)
            echo "Ben öldüm.";
    }
}

$kopek = new CanliVarlik;
$olmusKedi = new CanliVarlik(false);
$eray = new Insan("Eray", "Aydın");
$eray->anlat();
$eray->oldur();
$eray->anlat();
$olmusEray = new Insan("Eray", "Aydın", 25, false);
$olmusEray->anlat();