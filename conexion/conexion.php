<?php
$host="localhost";
$user="";
$password="";
$bd_name="";
$conexion = mysqli_connect($host, $user, $password, $bd_name);

if (!$conexion) {
    die("Fallo la conexion: " . mysqli_connect_error());
}
