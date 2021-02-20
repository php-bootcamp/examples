<!--
<p><a href="?isim=Eray">Eray</a></p>
<p><a href="?isim=Ali">Ali</a></p>

<?php
echo "<h1>Hoşgeldin ".$GLOBALS['_GET']['isim']."</h1>";
//var_dump($GLOBALS['_GET']);
/*
$isim = "Eray";

function yaz($mesaj) {
	global $isim;
	echo $isim.":".$mesaj."\n";
	
	//echo $GLOBALS['isim'].":".$mesaj."\n";
}

yaz("Selam");

//"var_dump($GLOBALS);
*/
?>
-->
<form method="post">
	<label>İsim:</label>
	<input type="text" name="isim" placeholder="İsim" />
	<input type="checkbox" name="kabul" value="yes" /> Kabul ediyorum
	<button name="btn" type="submit">Bana güzel bir şey söyle</button>
</form>
<?php if (isset($GLOBALS['_POST']["isim"]) && !empty($GLOBALS['_POST']["isim"])): ?>
	<h1>Hoşgeldin, <?php echo $GLOBALS['_POST']['isim']; ?></h1>
	<p>
		<?php if(isset($GLOBALS['_POST']['kabul'])): ?>
			<b>Kabul etmene sevindim :)</b>
		<?php else: ?>
			<b>Neden kabul etmedin :(</b>
		<?php endif; ?>
	</p>
<?php endif; ?>
<?php
echo "<pre>";
var_dump($GLOBALS);






























