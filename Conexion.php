<?php
$servidor = "localhost";
$usuario  = "root";
$password = "";
$bd       = "despensa_don_juan";

$conn = new mysqli($servidor, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


?>