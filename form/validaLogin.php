<?php

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/Disc-ing_2.0/";
include_once("../config/db.php");

$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM usuario WHERE (email = :usuario OR username = :usuario) AND senha = :senha");
$stmt->execute([':usuario' => $_GET['usuario'],
                ':senha' => $_GET['senha']]);
$check = $stmt->fetch();

echo $check['total'];


?>