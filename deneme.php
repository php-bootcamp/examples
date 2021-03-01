<?php
$products = ["deneme" => 1.33];
header("Content-Type: application/json");
header("Content-Disposition: attachment; filename=products.json");

echo json_encode($products);
