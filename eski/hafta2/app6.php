<!doctype html>
<html>
<head>
</head>
<body>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$kullaniciAdi = $_POST['kullaniciadi'];
	$parola = $_POST['parola'];

	if ($kullaniciAdi == "eray" && $parola == "eray") {
		$_SESSION['giris'] = true;
		$_SESSION['kullanici'] = $kullaniciAdi;
	}
}

if (isset($_GET['islem']) && $_GET['islem'] == "cikis") {
	session_destroy();
}
?>

<?php if(!isset($_SESSION['giris'])): ?>
<h1>Giriş Yap</h1>
<form method="post">
	<label for="kullaniciadi">Kullanıcı Adı:</label>
	<input type="text" name="kullaniciadi" id="kullaniciadi" />

	<label for="parola">Parola</label>
	<input type="password" name="parola" id="parola" />

	<button type="submit">Giriş Yap</button>
</form>
<?php else: ?>

<h1>Merhaba, <b><?php echo $_SESSION['kullanici']; ?></b>. <a href="?islem=cikis">Çıkış</a></h1>

<?php endif; ?>
</body>
</html>
