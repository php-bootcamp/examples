<?php

$users = explode(PHP_EOL, file_get_contents("users.txt"));

$passwords = explode(PHP_EOL, file_get_contents("passwords.txt"));

foreach ($passwords as $password) {
    $md5Password = md5($password);

    if (in_array($md5Password, $users)) {
        echo $password." found! (".$md5Password.")".PHP_EOL;
    } else {
        echo "[".$password."] karşılığı ".$md5Password." ve listede yok!".PHP_EOL;
    }
}