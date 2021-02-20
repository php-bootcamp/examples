<?php

require "database.php";

$id = $_GET['id'];

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $algo = $_POST['algo'];
    $timeCost = $_POST['time_cost'];
    $memoryCost = $_POST['memory_cost'];
    $threads = $_POST['threads'];

    $options = [];
    if ($timeCost)
        $options["time_cost"] = $timeCost;
    if ($memoryCost)
        $options['memory_cost'] = $memoryCost;
    if ($threads)
        $options['threads'] = $threads;

    $encryptedPassword = password_hash($password, $algo, $options);

    $updateStatement = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
    $updateStatement->execute([
        'id' => $id,
        'password' => $encryptedPassword
    ]);
}

$userStatement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$userStatement->execute(['id' => $id]);
$user = $userStatement->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html>
<head>
    <title><?=$user->email?></title>
</head>
<body>
<h1><?=$user->email?></h1>
<p>ID: <?=$user->id?></p>
<p>Parola: <?=$user->password?></p>
<p>Hash: <?=password_get_info($user->password)["algo"]?></p>
<form method="post">
    <label for="password">Yeni Parola</label>
    <input type="password" name="password" id="password" />
    <label for="algo">Algoritma</label>
    <?php
    /*
     * array(3) {
  [0]=>
  string(2) "2y"
  [1]=>
  string(7) "argon2i"
  [2]=>
  string(8) "argon2id"
}
     */
    ?>
    <select name="algo" id="algo">
        <?php foreach(password_algos() as $algo): ?>
        <option value="<?=$algo?>"><?=$algo?></option>
        <?php endforeach; ?>
    </select><br>
    <label for="memory_cost">Bellek Harcaması</label>
    <input type="number" id="memory_cost" name="memory_cost" /><br>
    <label for="time_cost">Zaman Maliyeti</label>
    <input type="number" id="time_cost" name="time_cost" /><br>
    <label for="threads">Kaç İşlem?</label>
    <input type="number" id="threads" name="threads" /><br>
    <button type="submit">Şifrele</button>
    <a href="sil.php?id=<?=$id?>">Sil</a>
</form>
</body>
</html>
