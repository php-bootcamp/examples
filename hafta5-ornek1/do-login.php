<?php

require "database.php";

$email = $_POST['email'];
$password = $_POST['password'];

$userCheckStatement = $pdo->prepare("SELECT id,password FROM users WHERE email = :email");
$userCheckStatement->execute(['email' => $email]);

if (!$userCheckStatement->rowCount()) {
    echo "Kullanıcı bulunamadı!";
    exit;
}

$user = $userCheckStatement->fetch(PDO::FETCH_OBJ);

if (!password_verify($password, $user->password)) {
    echo "Parola Hatalı!";
    exit;
}

echo "Kullanıcı Doğru!";
