<!doctype html>
<html>
<head>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$kullaniciAdi = $_POST['kullaniciadi'];
	$parola = $_POST['parola'];

	if ($kullaniciAdi == "eray" && $parola == "eray") {
		$_COOKIE['giris'] = true;
		$_COOKIE['kullanici'] = $kullaniciAdi;
		setcookie('giris', true);
		setcookie('kullanici', $kullaniciAdi);
	}
}

if (isset($_GET['islem']) && $_GET['islem'] == "cikis") {
	setcookie('giris', false, ['expires' => time()-3600]);
	setcookie('kullanici', null, ['expires' => time()-3600]);
}
?>

<?php if(!isset($_COOKIE['giris'])): ?>
<h1>Giriş Yap</h1>
<form method="post">
	<label for="kullaniciadi">Kullanıcı Adı:</label>
	<input type="text" name="kullaniciadi" id="kullaniciadi" />

	<label for="parola">Parola</label>
	<input type="password" name="parola" id="parola" />

	<button type="submit">Giriş Yap</button>
</form>
<?php else: ?>

<h1>Merhaba, <b><?php echo $_COOKIE['kullanici']; ?></b>. <a href="?islem=cikis">Çıkış</a></h1>

<?php endif; ?>
</body>
</html>
