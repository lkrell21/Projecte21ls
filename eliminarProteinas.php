<?php include_once('conexionBBDD.php');
$idProteina = $_POST["idProteina"];

$sql = "DELETE FROM proteinas WHERE idProteina = ".$idProteina;  

$resultado = mysqli_query($conexion, $sql);
   
$sql2="SELECT * FROM proteinas WHERE idProteina = '".$idProteina."'";
$resultado2 = mysqli_query($conexion, $sql);
//echo $sql2;

    if (mysqli_fetch_assoc($resultado2) == 0) {
        //header("Location: proteina.php");
        echo $sql2;

    } else echo "Error al eliminar <br>".$sql;    
    

//header("Location: ../proteinas.html?resultado=".$datos);
?>

</body></html>