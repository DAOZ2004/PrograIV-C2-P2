<?php 
session_start();
include('db.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>La Despensa de Don Juan - Tienda</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { width: 80%; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #004b93; color: white; }
        .form-box { background: #e9ecef; padding: 15px; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Tienda en Línea - La Despensa de Don Juan</h1>

    <?php if(isset($_SESSION['usuario'])): ?>
        <div class="form-box">
            <h3>Agregar Nuevo Producto</h3>
            <form action="insertar.php" method="POST">
                Nombre: <input type="text" name="nombre" required>
                Categoría: 
                <select name="categoria">
                    <option value="Lácteos">Lácteos</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Frutas">Frutas</option>
                </select>
                Precio: <input type="number" step="0.01" name="precio" required>
                ¿Disponible?: 
                <input type="radio" name="disponible" value="SI" checked> Sí
                <input type="radio" name="disponible" value="NO"> No
                <button type="submit">Guardar</button>
            </form>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    <?php else: ?>
        <p><a href="login.php">Inicie sesión</a> para agregar productos.</p>
    <?php endif; ?>

    <h3>Listado de Productos</h3>
    <table>
        <tr><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Disponible</th></tr>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM productos ORDER BY nombre_prod ASC");
        while($row = mysqli_fetch_assoc($res)) {
            echo "<tr><td>{$row['nombre_prod']}</td><td>{$row['categoria']}</td><td>${$row['precio']}</td><td>{$row['disponible']}</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>