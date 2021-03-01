<?php

$autoload = include __DIR__ . "/vendor/autoload.php";
$autoload->addPsr4('FractoTeam\\Validation', __DIR__."/vendor/fracto-team/php-validation/src");

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('loglar');
$log->pushHandler(new StreamHandler('hatalar.log', Logger::WARNING));

// add records to the log
$log->warning('Merhaba ben bir uyarıyım!', [
    'oAnkiIstek' => "/auth kısmına geldi!",
]);
$log->error('Ben de hatayım!');