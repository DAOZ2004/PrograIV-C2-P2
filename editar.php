<?php
session_start();
include("conexion.php");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM productos WHERE id=$id");
$row = $result->fetch_assoc();
?>

<h2>Editar Producto</h2>

<form method="POST" action="actualizar.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

Nombre:<br>
<input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br><br>

Categoria:<br>
<input type="text" name="categoria" value="<?php echo $row['categoria']; ?>"><br><br>

Precio:<br>
<input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>"><br><br>

Descripcion:<br>
<input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>"><br><br>

<button type="submit">Actualizar</button>
</form>