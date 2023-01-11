<?php
$host = "localhost";
$database = "projecte2";
$user = "spena21";
$password = "12345678";
$conexion = mysqli_connect($host, $user, $password,$database);

if (!$conexion) die("No ha podido realizarse la conexión".mysqli_connect_error());

else {


   //echo "Conexion correcta";
}
?>