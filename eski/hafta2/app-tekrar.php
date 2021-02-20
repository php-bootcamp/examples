<?php
/*
function say ($kacaKadar = 10) {
	$toplam = 0;
	for ($i=1; $i<=$kacaKadar; $i++) {
		echo "Saydım: ".$i."<br />";
		$toplam += $i;
	}
	return $toplam;
}

echo "Toplam: ".say(5);
*/

/*
function faktoriyel($sayi) {
	if ($sayi == 1)
		return 1;

	return $sayi * faktoriyel($sayi-1);
}

echo "Faktoriyel: ".faktoriyel(6);
echo "Faktoriyel: ".faktoriyel(5);
*/

function deneme() {
	echo "deneme'ye geldik";
	if (!function_exists('x')){
		function x() {
			echo "x'e geldik";
			deneme();
		}
	}
}

var_dump(function_exists('deneme'));
var_dump(function_exists('x'));
deneme();
var_dump(function_exists('x'));
x();
