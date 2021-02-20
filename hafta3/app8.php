<?php

interface TopOynayabilir
{
    public function topOyna();
}

trait TopOynama
{
    public function topOyna()
    {
        echo "Top oynuyor...";
    }
}

interface IpAtlayabilir
{
    public function ipAtla();
}

trait IpAtlama
{
    public function ipAtla()
    {
        echo "İp atlıyor...";
    }
}

interface KitapOkuyabilir
{
    public function kitapOku();
}

trait KitapOkuma
{
    public function kitapOku()
    {
        echo "Kitap okuyor...";
    }
}

abstract class Insan
{
    public $isim;
    public $soyisim;

    public function __construct($isim, $soyisim)
    {
        $this->isim = $isim;
        $this->soyisim = $soyisim;
    }
}

class HareketliInsan extends Insan implements TopOynayabilir, IpAtlayabilir
{
    use TopOynama, IpAtlama;
}

class DuranInsan extends Insan implements KitapOkuyabilir
{
    use KitapOkuma;
}

final class Eray extends HareketliInsan
{
    public function __construct()
    {
        parent::__construct("Eray", "Aydın");
    }
}

final class Orkun extends DuranInsan
{
    public function __construct()
    {
        parent::__construct("Orkun", "Çakılkaya");
    }
}

$eray = new Eray;
$eray->topOyna();
$eray->ipAtla();

$orkun = new Orkun;
$orkun->kitapOku();
