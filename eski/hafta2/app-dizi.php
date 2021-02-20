<?php

$dizi = range(1,10);

/*
// Array Walk

function ekranaYaz(&$sayi, $anahtar, $parametreler) {
	echo $anahtar." Anahtarlı Sayı: ".$sayi."\n";
	if (isset($parametreler['islem']) && $parametreler['islem'] == 'sayiyiDegistir') {
		$sayi *= 5;
	}
}

array_walk($dizi, 'ekranaYaz', ['islem' => 'sayiyiDegistir']);
print_r($dizi);
*/

/*
// Array Filter
print_r($dizi);

function ciftMi($sayi) {
	var_dump($arg1);
	var_dump($arg2);
	return $sayi%2==0;
}

function tekMi($sayi) {
	return !ciftMi($sayi);
}

//$yeniDizi = [];
//foreach ($dizi as $sayi) {
//	if (ciftMi($sayi))
//		$yeniDizi[] = $sayi;
//}

$teklerDizisi = array_filter($dizi, 'tekMi');
$ciftlerDizisi = array_filter($dizi, 'ciftMi');
 */

/*
// Array Reduce
print_r($dizi);

//$sonuc = 1;
//foreach ($dizi as $sayi) {
//	$sonuc *= $sayi;
//}

function carp ($sayi1, $sayi2) {
	return $sayi1*$sayi2;
}

echo "Çarpımları: ".array_reduce($dizi, "carp", 1);
 */

/*
// Array Map
print_r($dizi);

function kareler($sayi) {
	return $sayi*$sayi;
}

$dizi = array_map('kareler', $dizi);
print_r($dizi);
*/
