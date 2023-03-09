<?php 
include_once('conexionBBDD.php');
error_reporting(E_ALL ^ E_NOTICE);
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
    <meta name="title" content="La pagina inicial del projecte">
    <meta name="keywords" content="proteinas, farmacos, estadisticas, users, login, noticias, novedades">
    <meta name="description" content="Esta es la pagina principal, el home, donde se ven las noticias principales de las proteinas y los farmacos.">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Página principal</title>
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
        <div class="first-body">
            <img class="left-images" src="img/noticias/noticia1.jpg" alt="imagen noticia 1"/>
            <div class="inner_first-body-left">
                <h2>Científicos españoles resucitan proteínas de hace millones de años y las usan para corregir el albinismo en células humanas</h2>
                <p>Científicos de todo el mundo buscan microbios en los hielos de la Antártida, en las fosas más profundas de los océanos y en los entornos volcánicos más hostiles del planeta. Su objetivo es encontrar nuevas proteínas con las que mejorar las actuales técnicas de edición genética. Esto podría abrir la puerta a una nueva era de la ciencia y la medicina en la que se curen multitud de enfermedades corrigiendo el genoma de los pacientes con una facilidad pasmosa.</p>
            </div>
        </div>
        <div class="first-body">
            <img class="left-images" src="img/noticias/noticia2.jpg" alt="imagen noticia 2"/>
            <div class="inner_first-body-left">
                <h2>Descubierta la implicación de una nueva proteína en el cáncer de hígado</h2>
                <p>Investigadores de Cataluña han descrito el papel de una nueva proteína en el cáncer de hígado. El hallazgo, publicado en Journal of Hepatology, tiene una clara relevancia clínica ya que permitirá seleccionar los pacientes y aplicarles una terapia más específica.</p>
            </div>
        </div>
        <div class="first-body">
            <img class="left-images" src="img/noticias/noticia3.jpg" alt="imagen noticia 3"/>
            <div class="inner_first-body-left">
                <h2>Un nuevo fármaco creado en Barcelona es eficaz contra el tumor cerebral más común y agresivo</h2>
                <p>Investigadores del Vall d'Hebron Instituto de Oncología (VHIO) han demostrado la eficacia preclínica de un nuevo fármaco inmunológico basado en un anticuerpo que es capaz de lograr la regresión del glioblastoma, el tumor cerebral más frecuente y agresivo.</p>
            </div>
        </div>
        <div class="first-body">
            <img class="right-images" src="img/noticias/noticia4.jpg" alt="imagen noticia 4"/>
            <div class="inner_first-body-left">
                <h2>Paxlovid: así es el fármaco oral para tratar la covid-19</h2>
                <p>Los médicos españoles contarán dentro de poco con un nuevo recurso terapéutico en la lucha contra la pandemia. Se trata del Paxlovid, el nuevo medicamento oral de Pfizer, un combinado de dos antivirales, el ritonavir y el nirmatrelvir, con resultados que indican una reducción del 89% de hospitalizaciones en pacientes de alto riesgo.</p>
            </div>
        </div>
    </div>

    <footer class="footer">

        <div class="footer-left">
            <h3>L&S<span>WebProject</span></h3>
            <p class="footer-links">
            <a href="home.php" title="link al home">Home</a>
            <a href="estadisticas.php" title="link a estadisticas">Estadisticas</a>
            <a href="farmacos.php" title="link a farmacos">Farmacos</a>
            <a href="proteinas.php" title="link a proteinas">Proteinas</a>
            <a href="php/listaUsers.php" title="link a users">Usuarios</a>
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
