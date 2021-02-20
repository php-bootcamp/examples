<?php

/*
$mysql = mysqli_connect("localhost", "root", "toor", "caricatur");
// mysqli_connect_errno(); bağlantı hata kodu
mysqli_query($mysql, "UPDATE users SET password = 'parolamiGuncelledim' WHERE id=2");

$mysql = new mysqli("localhost", "root", "toor", "caricatur");
$mysql->query("UPDATE users SET password = 'bunuDaGuncelle' WHERE id=1");
$mysql = null;
*/

$dsn = "mysql:host=localhost;dbname=caricatur;charset=utf8";
$user = "root";
$password = "toor";

class User {
    public $id;
    public $email;
    public $password;

    public function __construct()
    {
        echo "Construct Çalıştı!";
        $this->tell();
    }

    public function tell()
    {
        echo "ID:".$this->id."<br>";
        echo "E-Posta:".$this->email."<br>";
        echo "Parola:".$this->password."<br>";
    }
}

try {
    $mysql = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // PDO::ATTR_DEFAULT_FETCH_MODE => ...
    ]);
    // $mysql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, ...);
    echo "MySQL bağlantısı yapıldı!<br>";

    $updateStatement = $mysql->prepare("UPDATE users SET email = :email WHERE id = :id");
    echo "<pre>";
    var_dump($updateStatement);
    echo "</pre>";
    $updateStatement->execute([
        "id" => 1,
        "email" => "eray@dahaYeni.com",
    ]);
    $updateStatement->execute([
        "id" => 2,
        "email" => "vedat@oldukcaYeni.com",
    ]);
    
    //$mysql->quote("deneme"); // 'deneme'
    //$mysql->quote("'deneme'"); // ''deneme''

    $users = $mysql->query("SELECT * FROM users");
    $users->setFetchMode(PDO::FETCH_ASSOC);
    while($user = $users->fetch(PDO::FETCH_OBJ)) {
        echo "User değişkeni geldi!<br>";
        echo "<pre>";
        var_dump($user);
        echo "</pre>";
    }

    /*
    $updateStatus = $mysql->exec("UPDATE users SET email='vedat@yeni.com' WHERE id=2");
    echo "Güncelleme yapıldı!";
    echo "<pre>";
    var_dump($updateStatus);
    echo "</pre>";

    $users = $mysql->query("SELECT * FROM users");
    $users->setFetchMode(PDO::FETCH_ASSOC);

    while($user = $users->fetch(PDO::FETCH_OBJ)) {
        echo "User değişkeni geldi!<br>";
        echo "<pre>";
        var_dump($user);
        echo "</pre>";
    }
    */

//    foreach ($users->fetchAll() as $user) {
//        /*
//        $instance = new User();
//        $instance->id = $user->id;
//        $instance->email = $user->email;
//        $instance->password = $user->password;
//        var_dump($instance);
//        */
//        /*
//        $user->tell();
//        echo "<pre>";
//        var_dump($user);
//        echo "</pre>";
//        */
//    }

} catch (PDOException $e) {
    echo "Bağlantı Hatası!";
    echo $e->getMessage();
} catch (Exception $e) {
    echo "Genel Hata";
}
