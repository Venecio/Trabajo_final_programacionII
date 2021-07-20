<?php
require("../conexion/conexion.php");
if(isset($_POST['enviar'])&&(!empty($_POST['enviar']))){
    $user=$_POST['username'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['username']=$user;
}
$consulta= "SELECT * FROM usuarios WHERE username = '$user' AND user_password = '$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0){
    header("Location: ../index.php");
}else{
    header("Location: login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);

