<?php
$host = "localhost";
$dbname = "discing";
$username = "discing";
$password = "532262";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn = $pdo;
} catch (PDOexception $e) {
    die("Erro de conexão: " . $e->getMessage());
}

?>