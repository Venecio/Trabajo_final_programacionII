<?php
require("../conexion/conexion.php");
if (isset($_POST['registro']) && (!empty($_POST['registro']))) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
}
$consultaruser = "SELECT username from usuarios where username = '$user'";
$resultado1 = mysqli_query($conexion, $consultaruser);
$filas = mysqli_num_rows($resultado1);

$consultarcorreo = "SELECT email from usuarios where email = '$email'";
$resultado2 = mysqli_query($conexion, $consultarcorreo);
$filas2 = mysqli_num_rows($resultado2);
if ($filas < 1) {
    $consulta = "INSERT INTO usuarios (username,user_password,email) VALUES ('$user','$password','$email')";
    $resultado = mysqli_query($conexion, $consulta);


    if ($resultado) {
        header("Location: login.php");
    } else {
        header("Location: registrarse.html");
    }
} elseif ($filas2 < 1) {
    $consulta = "INSERT INTO usuarios (username,user_password,email) VALUES ('$user','$password','$email')";
    $resultado = mysqli_query($conexion, $consulta);


    if ($resultado) {
        header("Location: login.php");
    } else {
        header("Location: registrarse.html");
    }
} elseif ($filas != 0) {
    echo "Ya existe un usuario registrado a ese nombre";
} elseif ($filas2 != 0) {
    echo "Ya existe un usuario registrado a ese correo electronico";
}
mysqli_free_result($resultado);
mysqli_close($conexion);