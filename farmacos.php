<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
$idUsuario="2";
session_start();
$idUsuario ="";
$rol="";
if(isset($_SESSION['usuario']) && isset($_SESSION['contrasenya']))
{
$idUsuario=$_SESSION["idUsuario"];
$rol=$_SESSION["rol"];
$usuario=$_SESSION["usuario"];
$btnLog = "<div id='divUsuario'><p>".$usuario."</p></div><a href='logout.php'>
<button id='btnLogin'>Logout</button>
</a>";
}
else 
{
    $btnLog = '<a href="login.php">
    <button id="btnLogin" title="Login">Login</button>
    </a>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="la pagina que muestra todos los farmacos">
    <meta name="keywords" content="farmacos, farmaco, busqueda, imagenes">
    <meta name="description" content="en esta pagina se podran ver todos los farmacos con su designada foto y tambien el motor de busqueda">
    <link rel="stylesheet" href="css/individual.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Consulta farmacos</title>
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
        <?php
        echo $btnLog;
        ?>
        </header>

    <div id="body">
        <div class="search-body">
            <div id="form-div">
                <form id="form" action="farmacos.php" method="post">
                    <input type="text" class="search-form" placeholder="Nombre" name="nom"/>
                    <input type="text" class="search-form" placeholder="Codigo" name="idFarmaco"/>
                    <input type="text" class="search-form" placeholder="SMILES" name="smiles"/>
                    <input type="text" class="search-form" placeholder="InChl" name="inchl"/>
                    <input type="date" class="search-form" placeholder="Fecha" name="fecha"/>
                    <input type="text" class="search-form" placeholder="Estado" name="estat"/>
                    <input type="submit" class="search-button" value="Buscar" />
                        <input name="enviat" type="hidden" value="1" />
                        <input name="Enviar" type="reset" value="Reset" class="search-button" />
                </form>
            </div>
        </div>
        <?php if($rol=="administrador" || $rol=="usuario"){
        ?>
        <div class="menuBotones">
            <a href="crear_farmaco.php" class="barraBotonesLink">
                <button class="btnNormal">Crear fármaco</button>
            </a>
            <a href="misFarmacos.php" class="barraBotonesLink">
                <button class="btnNormal">Mis fármacos</button>
            </a>
        </div>
        <?php
        }
        ?>
        <?php
if ($sele=="0") 
{	
    $sql = "SELECT * FROM farmacos ";
    $datos = "";
    
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos = $datos .
                "<div class='first-body'>
                    <img class='body-images' src='" . $row["imagen"] . "'/>
                    <div class='inner-first-body-principal'>
                        <form action='farmac.php'  method='post' name='formu'>
                            <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales' style='border: none;background-color: white; color: black;'/></h1>
                            <input type='hidden' value= '".$row["idFarmaco"] ."' name='idFarmaco'/>
                        </form>
                            <p>" . $row["descripcion"] . "</p>
                    </div>
                </div>";
        }
        echo $datos;
    } else
    echo "<div class='first-body-principal'><p>Ups... Se ha producido un error al cargar los datos! Vuelve a intentarlo</p></div>";
        // <!--<a href='proteina.php'>" .$row["nombre"] . "</a></h1>-->
}
    /*$sql = "SELECT * FROM farmacos";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_fetch_assoc($resultado)> 0){
        while ($row = mysqli_fetch_assoc($resultado)) {
            //$datos="";
            echo
                "<div class='first-body-principal'>
                    <img class='body-images' src='" . $row["imagen"] . "'/>
                    <div class='inner-first-body-principal'>
                        <form action='farmac.php'  method='post' name='formu'>
                            <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales'/ style='border: none;background-color: white; color: black;'></h1>
                            <input type='hidden' value= '".$row["idFarmaco"] ."' name='idFarmaco'/>
                            <input type='hidden' value= '".$row["nombre"] ."' name='nombre2'/>
                        </form>
                        <p>" . $row["descripcion"] . "</p>
                    </div>
                </div>";
                //echo $datos;
        }
        //echo $datos;
    } else
        echo "Se ha producido un error al cargar los datos..."; // <h1><a href='proteina.php'>" . $row["nombre"] . "</a></h1>
}*/
else{
    $sql = "SELECT * FROM farmacos where idUsuario in(select idUsuario from farmacos)";
    if ($_POST["nom"] != null) {
        $nom = $_POST["nom"];
        $sql = $sql . " AND nombre = '$nom'";
    }
    if ($_POST["SMILES"] != null) {
        $resolucio = $_POST["SMILES"];
        $sql = $sql . " AND SMILES = '$resolucio'";
    }
    if ($_POST["InChl"] != null) {
        $especie = $_POST["InChl"];
        $sql = $sql . " AND InChl = '$especie'";
    }
    if ($_POST["data"] != null) {
        $fecha = $_POST["data"];
        $sql = $sql . " AND convert(fecha,date) = '$fecha'";
    }
    if ($_POST["estado"] != null) {
        $fecha = $_POST["estado"];
        $sql = $sql . " AND estado = '$metode'";
    }
    if ($_POST["idFarmaco"] != null) {
        $idFarmaco = $_POST["idFarmaco"];
        $sql = $sql . " AND idFarmaco = '$idFarmaco'";
    }
    $datos = "";
    
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos = $datos .
                "<div class='first-body'>
                    <img class='body-images' src='" . $row["imagen"] . "'/>
                    <div class='inner-first-body-principal'>
                        <form action='farmac.php'  method='post' name='formu'>
                            <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales' style='border: none;background-color: white; color: black;'/></h1>
                            <input type='hidden' value= '".$row["idFarmaco"] ."' name='idFarmaco'/>
                        </form>
                            <p>" . $row["descripcion"] . "prueba 2</p>
                    </div>
                </div>";
            //<h1>id: " . $row["idProteina"]. " - Nom: " . $row["nombre"]. " - Resolucio" . $row["resolucion"]."</h1>";
        }
        echo $datos;
    } else
    echo "<div class='first-body-principal'><p>No hay datos con ese filtro</p></div>"; // <!--<a href='proteina.php'>" .$row["nombre"] . "</a></h1>-->
}
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
                    <span>Sobre la página</span>
                    Mejor página web para guardar y crear fármacos y proteínas :D
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
