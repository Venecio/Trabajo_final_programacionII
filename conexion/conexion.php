<?php
$host="localhost";
$username="";
$password="";
$bd_name="";
$conexion = mysqli_connect($host, $username, $password, $bd_name);

if (!$conexion) {
    die("Fallo la conexion: " . mysqli_connect_error());
}
