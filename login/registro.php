<?php
require("../conexion/conexion.php");
if (isset($_POST['registro']) && (!empty($_POST['registro']))) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
}
$consulta = "INSERT INTO usuarios (username,user_password,email) VALUES ('$user','$password','$email')";
$resultado = mysqli_query($conexion, $consulta);


if ($resultado) {
    header("Location: login.php");
} else {
    header("Location: registrarse.html");
}
mysqli_free_result($resultado);
mysqli_close($conexion);