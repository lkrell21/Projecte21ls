<?php include_once('conexionBBDD.php');?>
<html><head> <title>INDEX</title></head>
<body> <!--<h1>Consultar</h1>-->
<?php
//coger usuario y contraseña del formulario del login
$usuario=$_POST["usuario"];//  'jacinto';
$password =$_POST ["contrasenya"];//  '1234';
$sql= "SELECT * FROM usuarios where nombre = '$usuario' AND contrasenya = '$password'";
$resultado = mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
//mostrar la pàgina de inicio con el usuario logado
header('Location: ../home.html');
} else echo "Usuario o contraseña incorrecto.";
?>
</body></html>