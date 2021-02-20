<?php

require "database.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insertStatement = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $insertStatement->execute([
        'email' => $email,
        'password' => $hashedPassword,
    ]);
}

$users = $pdo->query("SELECT * FROM users", PDO::FETCH_OBJ);
?>
<!doctype html>
<html>
<head>
    <title>Kullanıcı Listesi</title>
</head>
<body>
<h1>Yeni Kullanıcı Ekle</h1>
<form method="post">
    <label for="email">E-Posta Adresi</label>
    <input type="email" name="email" id="email" />
    <label for="password">Parola</label>
    <input type="password" name="password" id="password" />
    <button type="submit">Kullanıcı Ekle</button>
</form>
<h1>Kullanıcılar</h1>
<ul>
    <?php while($user = $users->fetch()): ?>
    <li><a href="kullanici.php?id=<?=$user->id?>"><?=$user->email?></a></li>
    <?php endwhile; ?>
</ul>
</body>
</html>
