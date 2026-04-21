<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "despensa_don_juan");

// Lógica de validación de sesión para ingreso de datos [cite: 45]
$es_admin = isset($_SESSION['usuario_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>La Despensa de Don Juan - Inventario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="container">
    <h1>Sistema de Tienda en Línea</h1>
    
    <?php if($es_admin): ?>
        <div class="form-registro">
            <h3>Registrar Nuevo Producto (Modo Administrador)</h3>
            <form method="POST" action="guardar.php">
                <input type="text" name="nombre" placeholder="Nombre del producto" required>
                
                <label>Categoría:</label>
                <select name="categoria"> <option value="Abarrotes">Abarrotes</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Lácteos">Lácteos</option>
                </select>

                <input type="number" step="0.01" name="precio" placeholder="Precio" required>

                <label>¿Hay stock?</label> <input type="radio" name="stock" value="SI" checked> Sí
                <input type="radio" name="stock" value="NO"> No
                
                <button type="submit">Guardar Producto</button>
            </form>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    <?php else: ?>
        <div style="text-align:right;"><a href="login.php">Login para administradores</a></div>
    <?php endif; ?>

    <h3>Catálogo de Productos Disponibles</h3>
    <table>
        <thead>
            <tr><th>Producto</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Detalles</th></tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM productos ORDER BY nombre_producto ASC"; 
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>{$row['nombre_producto']}</td>
                        <td>{$row['categoria']}</td>
                        <td>\${$row['precio']}</td>
                        <td>{$row['stock_disponible']}</td>
                        <td>".($row['especificaciones'] ?? 'N/A')."</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>