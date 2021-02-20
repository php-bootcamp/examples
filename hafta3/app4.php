<?php

interface EklemeYapabilir
{
    public function ekle($kayit);
}

interface SilmeYapabilir
{
    public function sil($kayit);
}

interface GuncellemeYapabilir extends EklemeYapabilir
{
    public function guncelle($kayit);
}

abstract class VeritabaniTuru
{
    abstract protected function veritabaniAdi();
    abstract public function baglan($adres);
    abstract public function kapat();

    public function veritabaniBilgisi()
    {
        echo "Şuanki veritabanı: ".$this->veritabaniAdi();
    }
}

class MySQL extends VeritabaniTuru implements EklemeYapabilir, SilmeYapabilir
{
    public function baglan($adres)
    {
        echo $adres." adresine MySQL bağlantısı kuruluyor...";
    }

    public function kapat()
    {
        echo "MySQL bağlantısı kapatılıyor...";
    }

    protected function veritabaniAdi()
    {
        return "MySQL";
    }

    public function ekle($kayit)
    {
        echo "MySQL ekleme sorgusu ".$kayit." için yapılıyor...";
    }

    public function sil($kayit)
    {
        echo "MySQL silme sorgusu ".$kayit." için yapılıyor...";
    }
}

class Postgre extends VeritabaniTuru implements EklemeYapabilir
{
    public function baglan($adres)
    {
        echo $adres." adresine Postgre bağlantısı kuruluyor...";
    }

    public function kapat()
    {
        echo "Postgre bağlantısı kapatılıyor...";
    }

    protected function veritabaniAdi()
    {
        return "Postgre";
    }

    public function ekle($kayit)
    {
        echo "Postgre için ".$kayit." ekleme sorgusu...";
    }
}

$tur = "MySQL";

$mysql = new MySQL();
$mysql->baglan("localhost");
$mysql->veritabaniBilgisi();
$mysql->ekle("1");

$postgre = new Postgre();
$postgre->baglan("localhost");
$postgre->ekle("1");

var_dump($postgre instanceof SilmeYapabilir);