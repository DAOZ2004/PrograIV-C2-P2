<?php
session_start();
include("conexion.php");

// Si ya inició sesión lo manda directo al panel
if(isset($_SESSION['usuario'])){
    header("Location: agregar_producto.php");
    exit();
}

$error = "";

// Cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $_SESSION['usuario'] = $correo;
        header("Location: agregar_producto.php");
        exit();
    }else{
        $error = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Despensa Don Juan</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<form method="POST">
    <label>Correo:</label><br>
    <input type="email" name="correo" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Ingresar</button>
</form>

<br>
<span style="color:red;"><?php echo $error; ?></span>

</body>
</html>