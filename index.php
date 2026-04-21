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

<div class="container">
    <header>
        <h1>La Despensa de Don Juan</h1>
        <p>Sucursal San Miguel - Sistema de Inventario</p>
    </header>

    <?php if ($sesion_activa): ?>
        <div class="form-registro">
            <h2>Registrar Nuevo Producto</h2>
            <p>Bienvenido, <strong><?php echo $_SESSION['usuario_nombre']; ?></strong> | <a href="logout.php">Cerrar Sesión</a></p>
            
            <form action="guardar.php" method="POST">
                <div class="grupo">
                    <label>Nombre del Producto:</label>
                    <input type="text" name="nombre" required placeholder="Ej: Frijoles Rojos 1lb">
                </div>

                <div class="grupo">
                    <label>Categoría:</label>
                    <select name="categoria">
                        <option value="Abarrotes">Abarrotes</option>
                        <option value="Lácteos">Lácteos</option>
                        <option value="Limpieza">Limpieza</option>
                        <option value="Bebidas">Bebidas</option>
                    </select>
                </div>

                <div class="grupo">
                    <label>Precio Unitario ($):</label>
                    <input type="number" step="0.01" name="precio" required>
                </div>

                <div class="grupo">
                    <label>¿Disponible en Estantería?</label><br>
                    <input type="radio" name="stock" value="SI" checked> Sí hay stock
                    <input type="radio" name="stock" value="NO"> Agotado
                </div>

                <button type="submit" class="btn-guardar">Guardar en Base de Datos</button>
            </form>
        </div>
    <?php else: ?>
        <div class="aviso-visitante">
            <p>Usted está viendo el catálogo público. Para agregar o editar productos, por favor <a href="login.php">Inicie Sesión</a>.</p>
        </div>
    <?php endif; ?>

    <hr>

    <div class="tabla-datos">
        <h2>Catálogo de Productos Disponibles</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Estado de Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Requisito: Tabla ordenada (ORDER BY nombre_producto ASC)
                $query = "SELECT * FROM productos ORDER BY nombre_producto ASC";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre_producto'] . "</td>";
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "<td>$" . number_format($row['precio'], 2) . "</td>";
                        echo "<td>" . ($row['stock_disponible'] == 'SI' ? 'Disponible' : 'Agotado') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay productos registrados aún.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>