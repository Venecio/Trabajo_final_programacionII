<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/estilo_login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c0bb3670ef.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../../tienda/productos/recursos/favicon/icono.png" type="image/x-icon">

    <title>Bienvenido, ingrese su usuario</title>
</head>

<body>

    <div class="contenedor">

        <form class="formulario" action="verificarlogin.php" method="post">
            <h1 class="titulo">Inicia sesión o crea una cuenta <i class="fas fa-pizza-slice"></i></h1>

            <input class="input" type="text" name="username" placeholder="Usuario" pattern="[A-Za-z0-9_-]{1,15}" required><br>
            <input class="input" type="password" name="password" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}" required><br></i>
            <input class="boton" type="submit" name="Ingresar" value="Ingresar">
            <label>¿No tenes cuenta?</label><a class="botonregistro" href="registrarse.html">Registrarse</a>
        </form>

    </div>
</body>

</html>