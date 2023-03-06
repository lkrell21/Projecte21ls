<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
$nom=ucfirst($_POST["nombre"]);   
$idProteina=$_POST["idProteina"];
if (isset($_POST['eliminar'])) $sele=$_POST['eliminar'];
else $sele="0";
session_start();
$idUsuario ="";
$rol="";
if(isset($_SESSION['usuario']) && isset($_SESSION['contrasenya']))
{
$idUsuario=$_SESSION["idUsuario"];
$rol=$_SESSION["rol"];

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="la pagina que muestra una proteina en especifico">
    <meta name="keywords" content="proteina, informacion, imagen proteina, descripcion">
    <meta name="description" content="En esta pagina podremos ver una proteina en especifico, ya sea la nuestra o la de otro">    
    
    <script type="text/javascript" src="funcions.js"></script>

    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/individual.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?php echo $nom; ?></title>
</head>
<body>
    <header style="background-image: url('img/header3.jpg'); height: 200px;">
        <h1 id="header">Lucas & Sheila webproject</h1>
        <nav style ="margin-top: 55px;">
            <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <?php if($rol=="administrador"){
            echo '<a href="listaUsers.php" title="link a users">Usuarios</a>';
        }?>

        </nav>
        <a href="login.php">
        <button id="btnLogin" title="link al login">Login</button>
        </a>
        </header>

        <div id="body">
            <div class="search-body">
                <div id="form-div">
                <form id="form" action="proteinas.php" method="post">
                        <input type="text" class="search-form" placeholder="Nom" name="nom"/>
                        <input type="text" class="search-form" placeholder="Resolució" name="resolucio"/>
                        <input type="text" class="search-form" placeholder="Especie" name="especie"/>
                        <input type="text" class="search-form" placeholder="Data" name="data" />
                        <input type="text" class="search-form" placeholder="Metode" name="metode"/>
                        <input type="text" class="search-form" placeholder="Codi de la proteïna" name="idProteina"/>
                        <input type="submit" class="search-button" value="Cerca" />
                        <input name="enviat" type="hidden" value="1" />
                        <input name="Enviar" type="reset" value="Reset" class="search-button" />
                    </form>
                </div>
            </div>
            <div id="divEliminar" >
                <div id="eliminarBody">
                    <div class="eliminar-div">
                        <h2 >Seguro que quiere eliminar?</h2>
                            <form id="form" action="proteina.php" method="post" style="margin-top:0;margin-right:0" >                                                       
                                <input type="submit" value="Eliminar" class="buttonEspecial" id="eliminar2"></input>
                                <input type="hidden" value="<?php echo $idProteina;?>" name="idProteina"></input>
                                <input type="hidden" value="1" name="eliminar"></input>
                            </form>                           
                            <button class="buttonEspecial" id="cancelar" onclick="cancelarEliminar()">Cancelar</button>
                                                
                    </div>
                </div>
            </div>
            <?php if($sele==1){    
                                $idProteina = $_POST["idProteina"];

                                $sql = "DELETE FROM proteinas WHERE idProteina = ".$idProteina;  
                                
                                $resultado = mysqli_query($conexion, $sql);
                                   
                                $sql2="SELECT * FROM proteinas WHERE idProteina = '".$idProteina."'";
                                $resultado2 = mysqli_query($conexion, $sql);
                                
                                    //if (mysqli_fetch_assoc($resultado2)) {
                                        //echo "Error al eliminar <br>";
                                
                                    //}   
                                                            
                            ?>
                            <div id="divEliminar"class="divEliminar" style="display:block; margin-top:-200px" >
                                <div id="eliminarBody">
                                    <div id="eliminar-div">
                                        <h2 >Se ha eliminado correctamente</h2>
                                            <button id="aceptar" class="btnNormal" onclick="aceptarEliminarProteina()">Acceptar</button>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php 
                            }

    //echo $sql;
    
    $sql="SELECT * from proteinas where idProteina='".$idProteina."'";
    $resultado=mysqli_query($conexion,$sql);
   // $row = mysqli_fetch_assoc($resultado);
    while($row = mysqli_fetch_assoc($resultado)) {

?>
            <div class="first-body">
                <img class="body-images" src="<?php echo $row["imagen"];?>" alt="imagen proteina"/>
                <div class="inner-first-body">
                <div style="width:70%">
                    <h1 style="text-transform: uppercase;font-weight:bold;"><?php echo $row["nombre"];?></h1>
                    <ul align="left">
                        <li><b>Nom</b>: <?php echo $row["nombre"];?></li>
                        <li><b>Espècie</b>: <?php echo $row["especie"];?></li>
                        <li><b>Codi</b>: <?php echo $row["idProteina"];?></li>
                        <li><b>Mètode</b>: <?php echo $row["metodo"];?></li>
                        <li><b>Data</b>: <?php echo $row["fecha"];?></li>
                        <li><b>Resolució</b>: <?php echo $row["resolucion"];?></li>
                    </ul>
                </div>
                <div style="width:30%; display:flex; flex-wrap:wrap">
                    <button class="button" id="eliminar" onclick="eliminar()">Eliminar</button>
                    <form id="form" action="editar_proteina.php" method="post" style="margin-top:0;margin-right:0" enctype="multipart/form-data">                                                       
                            <input type="submit" value="Editar" class="button" id="editar" name="enviar" ></input>
                            <input type="hidden" value="1" name="editar"></input>
                            <input type="hidden" value="<?php echo $row["idProteina"];?>" name="idProteina"></input>
                            <input type="hidden" value="<?php echo $row["nombre"];?>" name="nombre2"></input>
                    </form>
                </div>
            </div>            
        </div>
<?php
}//}else{
   // echo"Error al cargar los datos.";
//}
?>
    <footer class="footer">

        <div class="footer-left">
            <h3>L&S<span>WebProject</span></h3>
            <p class="footer-links">
                <a href="home.php" title="link al home">Home</a>
                <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
                <a href="farmacos.php" title="link a farmacos">Farmacos</a>
                <a href="proteinas.php" title="link a proteinas">Proteinas</a>
                <?php if($rol=="administrador"){
            echo '<a href="listaUsers.php" title="link a users">Usuarios</a>';
        }?>
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
