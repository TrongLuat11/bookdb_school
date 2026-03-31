<?php
try {
    $dsn = "mysql:host=127.0.0.1;dbname=bookdb;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", ""); 
    $stmt = $pdo->query("DESCRIBE sach");
    print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (Exception $e) {
    echo $e->getMessage();
}
