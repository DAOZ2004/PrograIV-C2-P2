<?php
session_start();
include('Conexion.php'); // Conexión a la base de datos

// Variable para saber si el usuario inició sesión
$sesion_activa = isset($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Despensa de Don Juan - Sistema en Línea</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM productos");
?>

<h2>Productos</h2>

<a href="agregar_producto.php">Agregar nuevo</a><br><br>

<table border="1">
<tr>
<th>Nombre</th><th>Categoria</th><th>Precio</th><th>Acciones</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['categoria']; ?></td>
<td>$<?php echo $row['precio']; ?></td>
<td>
<a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
<a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
</td>
</tr>
<?php } ?>
</table>

<br>
<a href="logout.php">Cerrar sesión</a>