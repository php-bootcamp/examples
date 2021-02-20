<form method="post">
<button type="submit">POST'la</button>
</form>
<?php

echo "Şuanki Metod:" . $_SERVER['REQUEST_METHOD'];

?>
<pre><?php var_dump($_SERVER) ?></pre>
