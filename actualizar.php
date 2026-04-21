<?php
session_start();
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];

$conn->query("UPDATE productos SET 
nombre='$nombre', categoria='$categoria',
precio='$precio', descripcion='$descripcion'
WHERE id=$id");

header("Location: mostrar.php");
?>