<?php
session_start();
include('Conexion.php');

if (!isset($_SESSION['id_usuario'])) {
    die("Acceso denegado");
}

$id = $_GET['id'];

$query = "SELECT * FROM productos WHERE id_producto = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<form method="POST" action="actualizar.php">
    <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">

    Nombre:
    <input type="text" name="nombre" value="<?php echo $row['nombre_producto']; ?>">

    Precio:
    <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>">

    <button type="submit">Actualizar</button>
</form>