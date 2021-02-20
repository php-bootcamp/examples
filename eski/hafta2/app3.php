<!doctype html>
<html>
<head>

</head>
<body>
<?php
//phpinfo(32)
//var_dump($GLOBALS);
?>
<?php echo "<p>".$_SERVER['REQUEST_URI']."</p>"; ?>
<h1>İşlemler</h1>
<ul>
	<li><a href="?">Anasayfa</li>
	<li><a href="?islem=arama">Arama Yap</a></li>
	<li><a href="?islem=soyle">Bana güzel bir şey söyle</a></li>
</ul>
<?php if(isset($GLOBALS['_GET']['islem']) && $GLOBALS['_GET']['islem'] == "arama"): ?>
<h2>Arama Formu</h2>
<form method="post" action="app3.php?islem=arama">
	<label for="anahtar">Anahtar Kelime:</label>
	<input type="text" name="anahtar" placeholder="Anahtar kelime giriniz..." id="anahtar" />
	<button type="submit">Ara</button>
</form>
<?php if(isset($GLOBALS['_POST']['anahtar'])): ?>
<p>Yapılan arama: <b><?= $GLOBALS['_POST']['anahtar'] ?></b></p>
<?php endif; ?>
<?php endif; ?>

<?php if(isset($GLOBALS['_GET']['islem']) && $GLOBALS['_GET']['islem'] == "soyle"): ?>
<h2>Güzel Bir Şey Söyleme Formu</h2>
<form method="post">
	<label for="isim">İsim:</label>
	<input type="text" name="isim" id="isim" placeholder="İsminizi girin..." />
	<button type="submit">Güzel bir şey söyleme başvuru formunu ilgili birime ilet</button>
</form>
<?php if(isset($GLOBALS['_POST']['isim'])): ?>
<p>Güzel bir söz gelecek buraya <b><?= $GLOBALS['_POST']['isim'] ?></b></p>
<?php endif; ?>
<?php endif; ?>
</body>
</html>
