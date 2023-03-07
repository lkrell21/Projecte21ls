<?php include_once('conexionBBDD.php');?>
<html><head> <title>Crear nuevo farmaco</title></head>
<body> <!--<h1>Consultar</h1>-->
<?php
//coger usuario y contraseña del formulario del login
$nom=$_POST["nom"];
$smiles =$_POST ["smiles"];
$inchl =$_POST ["inchl"];
$fecha=date("Y-m-d.H:i:s");
$estat =$_POST ["estat"];
$descripcio =$_POST ["descripcio"];
$imatge=$_FILES["imatge"]["name"];
$idUsuario= 2;
//Falta como obtener usuario ???????
$res = move_uploaded_file($_FILES["imatge"]["tmp_name"], "../img/farmacos/".$imatge);
//`fecha`,

$sql= "Insert into farmacos (`nombre`, `SMILES`, `InChl`,`fecha`, `estado`, `imagen`, `descripcion`, `idUsuario`) VALUES('".$nom."', '".$smiles."', '".$inchl."', '".$fecha."', '".$estat."', '".$imatge."', '".$descripcio."', '".$idUsuario."')";
$resultado = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM farmacos where nombre='".$nom."'";
$resultado2 = mysqli_query($conexion, $sql2);
if (mysqli_num_rows($resultado2) > 0) {
echo"Insert correcto";

header('Location: ../crear_farmaco.php');
echo '<script type="text/javascript">
       window.onload = function () { alert("Fichero guardado"); } 
</script>';
echo $fecha;
} else echo "Usuario o contraseña incorrecto.";
if($res) {echo "<br>";}
else {echo "<br>Error al guardar fichero";}

?>
</body></html>