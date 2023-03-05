<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
if (isset($_POST['enviat2'])) $sele2="0";
else $sele2="1";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="la pagina para crear farmacos">
    <meta name="keywords" content="crear, farmacos, farmaco, guardar, eliminar">
    <meta name="description" content="en esta pagina, crear farmaco, es donde podras crear, añadir y guardar tu propio farmaco">
    <link rel="stylesheet" href="css/individual.css">
    <link rel="stylesheet" href="css/general.css">
    <script type="text/javascript" src="funcions.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>la pagina para crear farmacos</title>
</head>
<body>

    <header style="background-image: url('img/header3.jpg'); height: 200px;">
        <h1 id="header">Lucas & Sheila webproject</h1>
        <nav style ="margin-top: 55px;">
            <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <a href="php/listaUsers.php" title="link a users">Users</a>

        </nav>
        <a href="login.php">
            <button id="btnLogin" title="link al login">Login</button>
        </a>
        </header>
        <?php
if ($sele=="0") 
{	
    ?>
        <div id="body">
            <div id="divEliminar">
                <div id="eliminarBody">
                    <div id="eliminar-div">
                        <h2 id="confirmacionEliminacion">Segur que vol eliminar?</h2>
                        <button class="buttonEspecial" id="eliminar2" onclick="confirmarEliminar()">Eliminar</button>
                        <button class="buttonEspecial" id="cancelar" onclick="cancelarEliminar()">Cancelar</button>
                        <button id="aceptar" class="btnNormal"  onclick="cancelarEliminar()">Acceptar</button>
                    </div>
                </div>
            </div>
            <div class="first-body">
                <!--<img class="body-images" src="img/proteina.jpg" alt="imagen proteina A"/>
                <div class="inner-first-body"style="margin-left:0px;">

                    <button class="buttonEspecial" id="eliminar" onclick="eliminar()">Eliminar</button> -->               
                    <h1 style="text-align:center; margin-top:6%">NUEVO FÁRMACO</h1>
                    <form id="form" style="margin-left:0px;" action="crear_farmaco.php" method="post" enctype="multipart/form-data">
                        <input type="text" class="search-form" placeholder="Nombre" name="nom" required/>                        
                        <input type="text" class="search-form" placeholder="SMILES" name="smiles" required/>
                        <input type="text" class="search-form" placeholder="InChl" name="inchl" required/>
                        <input type="text" class="search-form" placeholder="Estado" name="estat" required/>
                        <input type="text" class="search-form" placeholder="Descripción" name="descripcio" required/>
                        <input type="file" class="search-form" placeholder="Imagen" style="margin-top:22px; margin-left:20px; " name="imatge" required/>
                        <input type="submit" class="search-button" value="Guardar" name="Enviar"/>
                        <input name="enviat" type="hidden" value="1" />
                        <input name="Enviar" type="reset" value="Reset" class="search-button" />
                    </form>
            </div>            
        </div>
        <?php 
} 

else 
{
    $nom=$_POST["nom"];
    $smiles =$_POST ["smiles"];
    $inchl =$_POST ["inchl"];
    $fecha=date("Y-m-d.H:i:s");
    $estat =$_POST ["estat"];
    $descripcio =$_POST ["descripcio"];
    $imatge=$_FILES["imatge"]["name"];
    $info = pathinfo($imatge);
    $tipoFichero= $info["extension"];
    $nomImatge = "img/farmacos/".$nom.".".$tipoFichero;
    $idUsuario= 2;
    $res = move_uploaded_file($_FILES["imatge"]["tmp_name"], $nomImatge);
    //`fecha`,
    
    $sql= "Insert into farmacos (`nombre`, `SMILES`, `InChl`,`fecha`, `estado`, `imagen`, `descripcion`, `idUsuario`) VALUES('".$nom."', '".$smiles."', '".$inchl."', '".$fecha."', '".$estat."', '".$nomImatge."', '".$descripcio."', '".$idUsuario."')";
    $resultado = mysqli_query($conexion, $sql);
    $sql2 = "SELECT * FROM farmacos where nombre='".$nom."'";
    $resultado2 = mysqli_query($conexion, $sql2);
    if (mysqli_num_rows($resultado2) > 0) {
    echo"<div class='first-body' style='text-align:center;'><h2>Fármaco introducido correctamente</h2><br><a href='crear_farmaco.php'>Introducir nuevo fármaco</a></div>";
    
    //header('Location: ../crear_farmaco.php');
   // echo '<script type="text/javascript">
     //      window.onload = function () { alert("Fichero guardado"); } 
    //</script>';
    //echo $fecha;
    } else echo "Ups... Algo ha fallado!";
    if($res) {echo "<br>";}
    else {echo "<br>Error al guardar fichero";}
    //echo $sql;
}?>
    <footer class="footer">

        <div class="footer-left">
            <h3>L&S<span>WebProject</span></h3>
            <p class="footer-links">
            <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <a href="php/listaUsers.php" title="link a users">Users</a>
            </p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Calle localizada</span>Barcelona</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+34 648 28 40 26</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com" title="link al email">L&Swp@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="infop">
                <span>Sobre la pagina</span>
                Mejor pagina web para guardar y crear farmacos y proteinas :D
            </p>
            <div class="footer-icons">
                <a href="https://es-es.facebook.com/" title="link a la pagina de facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/" title="link a la pagina de twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://github.com/" title="link a la pagina de github"><i class="fa fa-github"></i></a>
                <a href="web.whatsapp.com" title="link al chat directo de whatsapp"><i class="fa fa-whatsapp"></i></a>
            </div>
        </div>

    </footer>
</body>
</html> 
