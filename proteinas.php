<?php include_once('conexionBBDD.php');

error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
$rol="";
$usuario="";
session_start();
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
    <meta name="title" content="la pagina que muestra todas las proteinas">
    <meta name="keywords" content="proteinas, proteina, busqueda, imagenes">
    <meta name="description" content="en esta pagina se podran ver todas las proteinas con su designada foto y tambien el motor de busqueda">
    <link rel="stylesheet" href="css/individual.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Consulta proteinas</title>
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
                    <form id="form" action="proteinas.php" method="post">
                        <input type="text" class="search-form" placeholder="Nombre" name="nom"/>
                        <input type="text" class="search-form" placeholder="Resolución" name="resolucio"/>
                        <input type="text" class="search-form" placeholder="Espécie" name="especie"/>
                        <input type="date" class="search-form" placeholder="Fecha" name="data" />
                        <input type="text" class="search-form" placeholder="Metodo" name="metode"/>
                        <input type="text" class="search-form" placeholder="Codigo de la proteina" name="idProteina"/>
                        <input type="submit" class="search-button" value="Buscar" />
                        <input name="enviat" type="hidden" value="1" />
                        <input name="Enviar" type="reset" value="reset" class="search-button" />
                    </form>
                </div>
            </div>
            <?php if($rol=="administrador" || $rol=="usuario"){
              echo '<div class="menuBotones">
            
              <a href="crear_proteina.php" class="barraBotonesLink">
                    <button class="btnNormal">Crear proteina</button>
                </a>
                <a href="misProteinas.php" class="barraBotonesLink">
                    <button class="btnNormal">Mis proteinas</button>
                </a>
            </div>';
             }?>
            <?php
if ($sele=="0") 
{	
    $sql = "SELECT * FROM proteinas";
    $datos = "";

    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos = $datos .
            "<div class='first-body-principal'><img class='body-images' src='" . $row["imagen"] . "'/>
                <div class='inner-first-body-principal'>
                    <form action='proteina.php'  method='post' name='formu'>
                        <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales'></h1>
                        <input type='hidden' value= '".$row["idProteina"] ."' name='idProteina'/>
                    </form>
                    <p>" . $row["descripcion"] . " </p>
                </div>
            </div>";
            //<h1>id: " . $row["idProteina"]. " - Nom: " . $row["nombre"]. " - Resolucio" . $row["resolucion"]."</h1>";
        }
        echo $datos;
    } else
        echo "<div class='first-body-principal'><p>Ups... Se ha producido un error al cargar los datos! Vuelve a intentarlo</p></div>";// <!--<a href='proteina.php'>" .$row["nombre"] . "</a></h1>-->
}

else{
    $sql = "SELECT * FROM proteinas where idUsuario in(select idUsuario from proteinas)";
    if ($_POST["nom"] != null) {
        $nom = $_POST["nom"];
        $sql = $sql . " AND nombre = '$nom'";
    }
    if ($_POST["resolucio"] != null) {
        $resolucio = $_POST["resolucio"];
        $sql = $sql . " AND resolucion = '$resolucio'";
    }
    if ($_POST["especie"] != null) {
        $especie = $_POST["especie"];
        $sql = $sql . " AND especie = '$especie'";
    }
    if ($_POST["data"] != null) {
        $fecha = $_POST["data"];
        $sql = $sql . " AND convert(fecha,date) = '$fecha'";
    }
    if ($_POST["metode"] != null) {
        $metode = $_POST["metode"];
        $sql = $sql . " AND metodo = '$metode'";
    }
    if ($_POST["idProteina"] != null) {
        $idProteina = $_POST["idProteina"];
        $sql = $sql ." AND idProteina = '$idProteina'";
    }
    $datos = "";
  
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos = $datos .
            "<div class='first-body-principal'><img class='body-images' src='" . $row["imagen"] . "'/>
                <div class='inner-first-body-principal'>
                    <form action='proteina.php'  method='post' name='formu'>
                        <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales'></h1>
                        <input type='hidden' value= '".$row["idProteina"] ."' name='idProteina'/>
                    </form>
                    <p>" . $row["descripcion"] . " </p>
                </div>
            </div>";
            //<h1>id: " . $row["idProteina"]. " - Nom: " . $row["nombre"]. " - Resolucio" . $row["resolucion"]."</h1>";
        }
        echo $datos;
    } else
        echo "No hay datos con ese filtro "; // <!--<a href='proteina.php'>" .$row["nombre"] . "</a></h1>-->
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
