<h1>Avatar Yükle</h1>
<form method="post" enctype="multipart/form-data">
	<input type="text" name="isim" />
	<input type="file" name="avatar" />
	<button type="submit">yükle</button>
</form>
<?php
echo __DIR__;
if (isset($_FILES['avatar'])) {
	if (!file_exists(__DIR__.'/avatars')){
		mkdir(__DIR__.'/avatars');
	}
	$neyi = $_FILES['avatar']['tmp_name'];
	$nereye = __DIR__."/avatars/deneme.png";
	move_uploaded_file($neyi, $nereye);
//	move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__."/avatars/deneme.png");
	echo "<b>".$_FILES['avatar']['tmp_name']."</b>";
}
//var_dump($GLOBALS['_FILES']);
/*
echo "<pre>";
var_dump($_COOKIE);
//$_COOKIE['soyisim'] = "Aydın";
setcookie('soyisim', "Aydın");
echo "<h1>".$_COOKIE['isim']." ".$_COOKIE['soyisim']."</h1>";
var_dump($_REQUEST);
*/

