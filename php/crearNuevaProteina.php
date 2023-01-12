<?php include_once('conexionBBDD.php');?>
<html>
 
<head> 
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/farmacos.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <title>PROTEINAS</title></head>
<body> <!--<h1>Consultar</h1>-->
<?php


//coger usuario y contraseña del formulario del login

    $nom=$_POST["nom"];
    $resolucio=$_POST["resolucio"];

    $especie=$_POST["especie"];

    $fecha=date("d-m-Y");

    $metode=$_POST["metode"];

    $idProteina=$_POST["idProteina"];
    
    $sql= "Insert into proteinas Values(".$nom.", ".$resolució.", ".$metode.", "$imatge.", ";
    $res = move_uploaded_file($_FILES["imatge"]["tmp_name"], "../img/farmacos/".$imatge);

$sql= "SELECT * FROM proteinas where nombre = '$nom' AND idProteina = '$idProteina'";*/
$resultado = mysqli_query($conexion, $sql);
//header("Location: ../proteinas.html?resultado=".$resultado);
if (mysqli_num_rows($resultado) > 0) {
    echo'<form id="form" style="margin-left:0px;" method="post">
    <input type="text" value="true" />
    <input type="text" class="search-form" placeholder="Resolució" />
    <input type="text" class="search-form" placeholder="Especie" />
     <input type="text" class="search-form" placeholder="Metode" name="metode"/>
     <input type="text" class="search-form" placeholder="Descripció" name="descripcio"/>
    <input type="file" class="search-form" placeholder="Image" name="imatge" style="margin-top:22px; margin-left:20px; " />
    <input type="submit" class="search-button" value="Guardar" />
</form>';

//mostrar la pàgina de inicio con el usuario logado
while($row = mysqli_fetch_assoc($resultado)) {
    //$datos = $datos.
    "<div class='first-body'><img class='body-images' src='".$row["imagen"]."'/><div class='inner-first-body'><h1><a href='proteina.html'>".$row["nombre"]."</a></h1><p>
                ".$row["descripcion"]."</p></div></div>";
    //<h1>id: " . $row["idProteina"]. " - Nom: " . $row["nombre"]. " - Resolucio" . $row["resolucion"]."</h1>";
}
echo $datos;
} else echo "Usuario o contraseña incorrecto.";

//header("Location: ../proteinas.html?resultado=".$datos);
?>
</body></html>