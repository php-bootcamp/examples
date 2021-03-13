<!doctype html>
<html>
<head>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="file" name="deneme" />
<button type="submit">Gönder</button>
</form>
<?php
echo "<pre>";
var_dump($_FILES['deneme']);
echo "</pre>";
?>
</body>
</html>
