<?php include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['enviat'])) $sele=$_POST['enviat'];
else $sele="0";
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
    <title>la pagina que muestra todas las proteinas</title>
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
                        <input name="Enviar" type="reset" value="reset" class="search-button" />
                    </form>
                </div>
            </div>
            <div class="menuBotones">
                <a href="crear_proteina.php" class="barraBotonesLink">
                    <button class="btnNormal">Crear proteïna</button>
                </a>
                <a href="misProteinas.php" class="barraBotonesLink">
                    <button class="btnNormal">Les meves proteïnes</button>
                </a>
            </div>
            
            <?php
if ($sele=="0") 
{	
    $sql = "SELECT * FROM proteinas";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_fetch_assoc($resultado)>0){
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos = $datos .
                "<div class='first-body-principal'><img class='body-images' src='" . $row["imagen"] . "'/>
                <div class='inner-first-body-principal'>
                <form action='proteina.php'  method='post' name='formu'>
                            <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales'></h1>
                            <input type='hidden' value= '".$row["idProteina"] ."' name='idProteina'/>
                        </form>
                        <p>
            " . $row["descripcion"] . " prueba1 </p></div></div>";
        }
        echo $datos;
    } else
        echo "Se ha producido un error al cargar los datos..."; // <h1><a href='proteina.php'>" . $row["nombre"] . "</a></h1>
    ?>
               <!-- <img class="body-images" src="img/proteina.jpg" alt="imagen proteina 11"/>
                <div class="inner-first-body">
                    <h1><a href="proteina.php">NOM PROTEÏNA</a></h1>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                        consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                    </p>
                </div>
            </div>
            <div class="first-body">
                <img class="body-images" src="img/proteina.jpg" alt="imagen proteina 12"/>
                <div class="inner-first-body">
                    <h1><a href="proteina.php">NOM PROTEÏNA</a></h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium 
                    consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.</p>
                </div>
            </div>
            <div class="first-body">
                <img class="body-images" src="img/proteina.jpg" alt="imagen proteina 13"/>
                <div class="inner-first-body">
                    <h1><a href="proteina.php">NOM PROTEÏNA</a></h1>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                        consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                    </p>
                </div>
            </div>
            <div class="first-body">
                <img class="body-images" src="img/proteina.jpg" alt="imagen prtoeina 14"/>
                <div class="inner-first-body">
                    <h1><a href="proteina.php">NOM PROTEÏNA</a></h1>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.</br> Eligendi rerum repellat magnam similique praesentium
                        consectetur odit modi, asperiores, ipsum dolor ex, repellendus delectus.</br> Eligendi architecto eos, unde earum commodi aut.
                    </p>
                </div>
            </div>-->
<?php }

else{
    $sql = "SELECT * FROM proteinas";
    if ($_POST["nom"] != null) {
        $nom = $_POST["nom"];
        $sql = $sql . " where nombre = '$nom'";
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
        $sql = $sql . " AND cast(date,fecha) = '$fecha'";
    }
    if ($_POST["metode"] != null) {
        $fecha = $_POST["metode"];
        $sql = $sql . " AND metode = '$metode'";
    }
    if ($_POST["idProteina"] != null) {
        $idProteina = $_POST["idProteina"];
        $sql = $sql . " AND idProteina = '$idProteina'";
    }
    $datos = "";
  
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $datos = $datos .
                "<div class='first-body'>
                    <img class='body-images' src='" . $row["imagen"] . "'/>
                    <div class='inner-first-body'>
                        <form action='proteina.php'  method='post' name='formu'>
                            <h1><input type='submit' value= '".$row["nombre"] ."' name='nombre' class='titulosIndividuales'/ style='border: none;background-color: white; color: black;'/></h1>
                            <input type='hidden' value= '".$row["idProteina"] ."' name='idProteina'/>
                            <input type='hidden' value= '".$row["nombre"] ."' name='nombre2'/>
                        </form>
                           <p>" . $row["descripcion"] . "prueba 2</p>
                    </div>
                </div>";
            //<h1>id: " . $row["idProteina"]. " - Nom: " . $row["nombre"]. " - Resolucio" . $row["resolucion"]."</h1>";
        }
        echo $datos;
    } else
        echo "No hay datos con ese filtro"; // <!--<a href='proteina.php'>" .$row["nombre"] . "</a></h1>-->
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
