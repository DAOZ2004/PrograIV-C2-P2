<?php
session_start();
include('Conexion.php'); // Asegúrate de tener el archivo de conexión creado

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Consulta para buscar al usuario
    $sql = "SELECT id_usuarios, username, password FROM usuarios WHERE username = '$usuario'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Verificamos la contraseña (en este ejemplo comparamos texto plano, 
        // pero para producción se recomienda password_verify)
        if ($password == $row['password']) {
            $_SESSION['id_usuarios'] = $row['id_usuarios'];
            $_SESSION['usuario_nombre'] = $row['username'];
            
            header("Location: index.php"); // Redirige al inventario
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El usuario no existe.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - La Despensa de Don Juan</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .login-box {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .error-msg { color: red; font-size: 14px; margin-bottom: 10px; }
        .btn-login {
            background-color: #003399;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-login:hover { background-color: #002570; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="text-align:center; color: #cc0000;">Iniciar Sesión</h2>
        
        <?php if($error != ""): ?>
            <p class="error-msg"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Usuario:</label>
            <input type="text" name="username" required>
            
            <label>Contraseña:</label>
            <input type="password" name="password" required>
            
            <button type="submit" class="btn-login">Ingresar al Sistema</button>
        </form>
        <p style="text-align:center; margin-top:15px;">
            <a href="index.php" style="font-size:12px; color:gray;">Volver al catálogo</a>
        </p>
    </div>
</body>
</html>