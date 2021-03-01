<?php

use MongoDB\BSON\ObjectId;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

if (!extension_loaded("MongoDB")) {
    die("MongoDB yükle!");
}

$database = new Manager('mongodb://localhost:27017');

/*
// Toplu yazma işlemi (güncelleme,  silme veya ekleme)
$write = new BulkWrite();
$write->insert(['email' => "er@yayd.in", 'password' => md5("123456")]);
$write->insert(['email' => "orkun@mail.io", 'password' => md5("123123")]);

$result = $database->executeBulkWrite('project_streamify.users', $write);
// Toplu yazma işleminin sonucu
var_dump($result);
*/

$query = new Query([
    'email' => "er@yayd.in",
], [
    'sort' => ['_id' => 1],
    'limit' => 2
]);

$result = $database->executeQuery('project_streamify.users', $query);
foreach ($result as $user) {
    echo "ID: " . $user->_id . PHP_EOL;
    echo "E-Posta: " . $user->email . PHP_EOL;
}