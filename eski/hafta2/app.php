<?php

// While Konusu
/*
$sayi = 1;
while ($sayi <= 3) {
	echo $sayi.PHP_EOL;
	$sayi++;
}
//while ($sayi <= 3):
//	echo $sayi;
//endwhile;
echo "Sayma işlemi bitti".PHP_EOL;
*/

// Do-While Konusu
//do {
//	// yapılacak olan işlemler (1 sefer kesin olarak çalışır)
//	// ...
//	// ...
//} while (koşul);

//$sayi = 1;
//do {
//	echo $sayi.PHP_EOL;
//	$sayi++;
//} while ($sayi <= 3);

//for (ifade1; koşul; ifade3) {
//	// kodlar
//	// ...
//	// ...
//}

//for ($sayi=1; $sayi <= 3; $sayi++) {
//	echo $sayi."\n";
//}

//for ($sayi=1; $sayi <= 3; $sayi++):
//	echo $sayi."\n";
//endfor;

//for ($sayi=1; $sayi<=10; $sayi++) {
//	echo "Sayı: " . $sayi . "\n";
//	for ($toplam=0, $sayi2=1; $sayi2 <= $sayi; $sayi2++) {
//		$toplam += $sayi2;
//	}
//	echo "1'den bu sayıya kadar olan sayıların toplamı: " . $toplam . "\n";
//}

//$sayi=1;
//while ($sayi<=10):
//	echo "Sayı: " . $sayi . "\n";
//	$toplam = 0;
//	$sayi2 = 1;
//	while ($sayi2 <= $sayi):
//		$toplam += $sayi2;
//		$sayi2++;
//	endwhile;
//	echo "1'den bu sayıya kadar olan sayıların toplamı: " . $toplam . "\n";
//	$sayi++;
//endwhile;

//foreach ($dizi as $deger) {
//	// Her bir değer için yapacağım işlem...
//}

//$sayilar = [
//	"birinci" => 5,
//	"ikinci" => 6,
//	"ucuncu" => 7
//];
//
//foreach ($sayilar as $anahtar => $sayi){
//	echo $anahtar." sayı: " . $sayi."\n";
//}

//if ($deger == eşitlik1) {
//	// kodlar
//} else if ($deger == eşitlik2) {
//	// kodlar
//}
//
//switch ($deger) {
//	case eşitlik1:
//	case eşitlik2:
//	case eşitlik3:
//		// kodlar
//		break;
//}

//$sayi = 4;
//switch ($sayi) {
//	case 0:
//		echo "Bu sayı sıfır";
//		break;
//	case 1:
//		echo "Bu sayı bir";
//		break;
//	case 2:
//	case 3:
//		echo "Bu sayı iki veya üç";
//		break;
//	default:
//		echo "Bu sayı 0,1,2 veya 3 değil";
//		break;
//}

//$isim = "2";
//
//switch ($isim) {
//	case 2:
//		echo 2;
//		break;
//	case "2":
//		echo "Merhaba, Eray";
//		break;
//
//}

//$sayi = 0;
//while ($sayi <= 3) {
//	$sayi++;
//	if ($sayi == 2) {
//		continue;
//	}
//	echo $sayi;
//}

//for ($sayi=1;$sayi<=3;$sayi++) {
//	if ($sayi == 2)
//		break;
//	echo $sayi."\n";
//}

//for ($sayi=1; $sayi<=10; $sayi++) {
//	echo $sayi."\n";
//	for ($toplam=0, $sayi2=1; $sayi2<=$sayi; $sayi2++) {
//		if ($sayi2 == 4) {
//			break;
//		}
//		$toplam += $sayi2;
//	}
//	echo "Toplamlar: " . $toplam . "\n";
//}

//while, do-while, for, foreach, switch
//	- continue
//	- break

//for ($harf="A"; $harf <= "Z"; $harf++) {
//	echo $harf."\n";
//}

//$dizi = [
//	"birinci" => 1,
//	"ikinci" => 2,
//	"ucuncu" => 3,
//];
//
//$dizi["dorduncu"] = 4;
//$dizi[] = 5;
//$dizi[] = 6;
//print_r($dizi);
//
//unset($dizi["ucuncu"]);
//
//print_r($dizi);
//
//unset($dizi[1]);
//
//$dizi[] = 7;
//
//print_r($dizi);

//$dizi = [
//	0 => 1,
//	30 => 2,
//];
//
//print_r($dizi);
#echo $dizi[0];

//$ogrenciler = [
//	[
//		"isim" => "Eray",
//		"not" => 55,
//	],
//	[
//		"isim" => "Ali",
//		"not" => 90,
//	],
//	[
//		"isim" => "Ayşe",
//		"not" => 100,
//	]
//];
//
//$ogrenciler[] = array(
//	"isim" => "Can",
//	"not" => 30,
//);
//
//$ogrenci = [
//	"isim" => "Ayşe",
//	"not" => 100,
//];
//
//foreach ($ogrenciler as $ogrenci) {
//	echo $ogrenci["isim"]." öğrencisinin notu: ".$ogrenci["not"]."\n";
//}

$fakulteler = [
	[
		"adi" => "Mühendislik Fakültesi",
		"bolumler" => ["Bilgisayar Müh.", "Makine Müh.", "Elekt. Müh."],
	],
	[
		"adi" => "Edebiyat Fakültesi",
		"bolumler" => ["Tarih", "Psikoloji", "Sosyoloji", "Radyo Televizyon"],
	],
	[
		"adi" => "Diş Hekimliği Fakültesi",
		"bolumler" => ["Diş1", "Diş2"],
	],
	[
		"adi" => "Fen Fakültesi",
		"bolumler" => ["Matematik", "Fizik", "Kimya"],
	],
];

//for ($index=0; $index < count($fakulteler); $index++) {
//	$fakulte = $fakulteler[$index];
//	echo "Fakülte: ".$fakulte["adi"]."\n";
//	echo "Bölümler:"."\n";
//	$bolumIndex = 0;
//	while ($bolumIndex < count($fakulte['bolumler'])) {
//		$bolum = $fakulte['bolumler'][$bolumIndex];
//		echo "- ".$bolum."\n";
//		$bolumIndex++;
//	}
//}

//foreach ($fakulteler as $fakulte) {
//	echo "Fakülte: " . $fakulte["adi"] . "\n";
//	echo "Bölümler:\n";
//	foreach ($fakulte["bolumler"] as $bolum) {
//		echo "- ".$bolum."\n";
//	}
//}

//var_dump(array_rand($fakulteler, 2));
//list(, $ikinciFakulte) = [0,2];
//var_dump($ikinciFakulte);

//var_dump($fakulteler[array_rand($fakulteler)]);

/*
function yazBakalim($baslik, $son, $mesaj = "Mesajım yok") {
	echo $baslik.": " . $mesaj . " -- ".$son;
}

yazBakalim("Chat", "Mesajım bu kadar");
yazBakalim("Chat", "Mesaj", "Merhaba!");
yazBakalim("Sohbet", "Mesaj", "Deneme!");
 */

/*
function faktoriyel($sayi) {
	if ($sayi == 1)
		return 1;

	return $sayi * faktoriyel($sayi-1);	
}

var_dump(faktoriyel(5));
*/

function x() {
	echo "x'deyim";
	function y() {
		echo "y'deyim";
	}
}

x();
y();



