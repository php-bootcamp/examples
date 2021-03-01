<?php

/*
$products = [
    [
        "name" => "iPhone 7",
        "price" => 1700,
        "description" => "iPhone 7 inanılmaz fiyata..."
    ],
    [
        "name" => "iPhone 7",
        "price" => 1700,
        "description" => "iPhone 7 inanılmaz fiyata..."
    ],
    [
        "name" => "iPhone 7",
        "price" => 1700,
        "description" => "iPhone 7 inanılmaz fiyata..."
    ],
];

echo json_encode($products, JSON_PRETTY_PRINT);
*/

$json = '[{"name":"iPhone 7","price":1700,"description":"iPhone 7 inan\u0131lmaz fiyata..."},{"name":"iPhone 7","price":1700,"description":"iPhone 7 inan\u0131lmaz fiyata..."},{"name":"iPhone 7","price":1700,"description":"iPhone 7 inan\u0131lmaz fiyata..."}]';

$data = json_decode($json, true);

var_dump($data);