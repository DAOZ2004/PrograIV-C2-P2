<?php
session_start();
include("conexion.php");

// proteger página (solo si hay sesión)
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM productos WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Editar Producto</h2>

<form method="POST" action="actualizar.php">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<label>Nombre:</label>
<input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>

<label>Categoria:</label>
<input type="text" name="categoria" value="<?php echo $row['categoria']; ?>" required>

<label>Precio:</label>
<input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>" required>

<label>Descripcion:</label>
<input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>">

<button type="submit">Actualizar</button>

</form>

<br>
<div class="menu">
    <a href="index.php">Volver a productos</a> |
    <a href="logout.php">Cerrar sesión</a>
</div>

</body>
</html>