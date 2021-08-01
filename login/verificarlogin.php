<?php
require("../conexion/conexion.php"); //cambiar nombres de variables
if(isset($_POST['Ingresar'])&&(!empty($_POST['Ingresar']))){
    $user=$_POST['username'];
    $password=$_POST['password'];

}
$consulta= "SELECT * FROM usuarios WHERE username = '$user' AND user_password = '$password'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas>0){
    session_start();
    $row= mysqli_fetch_assoc($resultado);
    $id_user=$row['id_user'];
    $_SESSION['username']=$user;
    $_SESSION['id_user']=$id_user;
    header("Location: ../index.php");
}else{
    header("Location: login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);

