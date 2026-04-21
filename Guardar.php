<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO productos(nombre,categoria,precio,descripcion)
        VALUES('$nombre','$categoria','$precio','$descripcion')";

$conn->query($sql);
header("Location: mostrar.php");
?>