<?php

require "database.php";

$id = $_GET['id'];

$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
header("Location: index.php");