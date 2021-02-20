<?php

$host = "localhost";
$user = "root";
$pass = "toor";
$dbName = "caricatur";

try {
    $pdo = new PDO("mysql:host=".$host.";dbname=".$dbName, $user, $pass);
    $encryptedPassword = password_hash('deneme', PASSWORD_ARGON2I);
//    $pdo->exec("INSERT INTO users (email, password) VALUES ('deneme@deneme.com', '".$encryptedPassword."')");
//    echo "Son eklenen: ".$pdo->lastInsertId()."<br>";
} catch (PDOException $e) {
    echo "Bağlantı Hatası!";
    exit;
}
