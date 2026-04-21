<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<link rel="stylesheet" href="estilos.css">
<h2>Agregar Producto</h2>

<form method="POST" action="guardar.php">
Nombre:<br>
<input type="text" name="nombre" required><br><br>

Categoria:<br>
<select name="categoria">
<option>Granos</option>
<option>Bebidas</option>
<option>Lácteos</option>
<option>Snacks</option>
</select><br><br>

Precio:<br>
<input type="number" step="0.01" name="precio" required><br><br>

Descripcion:<br>
<input type="text" name="descripcion"><br><br>

<button type="submit">Guardar</button>
</form>

<br>
<a href="index.php">Ver productos</a> |
<a href="logout.php">Cerrar sesión</a>