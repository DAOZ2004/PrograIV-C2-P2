<?php
session_start();
include("conexion.php");

$id = $_GET['id'];
$conn->query("DELETE FROM productos WHERE id=$id");

header("Location: index.php");
?>