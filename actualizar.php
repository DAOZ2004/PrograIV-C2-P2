<?php
session_start();
include('Conexion.php');

if (!isset($_SESSION['id_usuario'])) {
    die("Acceso denegado");
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$sql = "UPDATE productos 
        SET nombre_producto='$nombre', precio='$precio'
        WHERE id_producto='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}