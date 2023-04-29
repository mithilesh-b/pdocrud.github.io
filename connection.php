<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "college";
$dsn = "mysql:host=$server;dbname=$dbname;charset=utf8mb4";
try {
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
