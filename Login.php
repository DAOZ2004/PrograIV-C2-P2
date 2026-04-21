<?php
session_start();
include("conexion.php");

if(isset($_SESSION['usuario'])){
    header("Location: agregar_producto.php");
    exit();
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios 
            WHERE username='$username' 
            AND correo='$correo' 
            AND password='$password'";

    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $_SESSION['usuario'] = $username;
        header("Location: agregar_producto.php");
        exit();
    }else{
        $error = "Datos incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Iniciar Sesión</h2>

<form method="POST">

<label>Username:</label>
<input type="text" name="username" required>

<label>Correo:</label>
<input type="email" name="correo" required>

<label>Contraseña:</label>
<input type="password" name="password" required>

<button type="submit">Ingresar</button>

</form>

<p class="error"><?php echo $error; ?></p>

</body>
</html>