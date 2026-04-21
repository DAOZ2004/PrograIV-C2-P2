<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "despensa_don_juan";

$conn = new mysqli($servidor, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>