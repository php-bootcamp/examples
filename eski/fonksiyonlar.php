<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach(get_loaded_extensions() as $x){
    echo "<font color='#FF0000'>".$x."</font><br />";
    echo "<ol>";
    $eklenti += 1;
    foreach(get_extension_funcs($x) as $a){
    echo "<li><a href='http://tr.php.net/manual/en/function.".mb_ereg_replace("_","-",$a)."'.php>$a</a></li>";
    $sayi += 1;
    }
    echo "</ol><br />";
    }
    echo "<strong>".$eklenti." adet eklentide ".$sayi." adet fonksiyon mevcut...</strong>";
    ?>
</body>
</html>