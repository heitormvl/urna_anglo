<?php

require 'config.php';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    return $pdo;
} catch (PDOException $e) {
    echo $e->getMessage();
}
