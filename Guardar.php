<?php
session_start();
include('Conexion.php');

// Si alguien intenta entrar aquí sin loguearse, lo sacamos
if (!isset($_SESSION['id_usuarios'])) {
    die("Acceso denegado. Debes estar registrado para realizar esta acción.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysqli_real_escape_string($conn, $_POST['nombre']);
    $cat = $_POST['categoria'];
    $pre = $_POST['precio'];
    $stk = $_POST['stock'];

    $sql = "INSERT INTO productos (nombre_producto, categoria, precio, stock_disponible) 
            VALUES ('$nom', '$cat', '$pre', '$stk')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=ok");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>