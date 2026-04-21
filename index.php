<?php
session_start();
include("conexion.php");

// Verificar si hay sesión activa
$sesion_activa = isset($_SESSION['usuario']);

$result = $conn->query("SELECT * FROM productos ORDER BY nombre ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Despensa Don Juan</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Productos disponibles</h2>

<?php if($sesion_activa){ ?>
    <div class="menu">
        <a href="agregar_producto.php">Agregar producto</a>
    </div>
<?php } ?>

<table>
<tr>
<th>Nombre</th>
<th>Categoría</th>
<th>Descripción</th>
<th>Precio</th>

<?php if($sesion_activa){ ?>
<th>Acciones</th>
<?php } ?>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['categoria']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td>$<?php echo $row['precio']; ?></td>

<?php if($sesion_activa){ ?>
<td>
<a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a> |
<a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
</td>
<?php } ?>

</tr>
<?php } ?>
</table>

<br>

<div class="menu">

<?php if($sesion_activa){ ?>
    <a href="logout.php">Cerrar sesión</a>
<?php } else { ?>
    <p>¿Ya tienes cuenta?</p>
    <a href="login.php">Iniciar sesión</a>
<?php } ?>

</div>

</body>
</html>