<?php
session_start();
if(isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingrese</title>
</head>

<body>
    <form action="verificarlogin.php" method="post">
        <input type="text" name="username" placeholder="Usuario" pattern="[A-Za-z0-9_-]{1,15}"required>
        <input type="password" name="password" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}"required>
        <input type="submit" name="enviar"> 
    </form>
    <a href="registrarse.html" name="registro">Registrarse</a> 

</body>

</html>