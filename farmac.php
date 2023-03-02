<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv= "content-type" content="text/html;charset=es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="la pagina que muestra un farmaco en especifico">
    <meta name="keywords" content="farmaco, informacion, imagen farmaco, descripcion">
    <meta name="description" content="En esta pagina podremos ver un farmaco en especifico, ya sea el nuestro o el de otro">
    <link rel="stylesheet" href="css/individual.css">
    <link rel="stylesheet" href="css/general.css">
    <script type="text/javascript" src="funcions.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>la pagina que muestra un farmaco en especifico</title>
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
            <div id="divEliminar" >
                <div id="eliminarBody">
                    <div id="eliminar-div">
                        <h2 id="confirmacionEliminacion">Seguro que quiere eliminar?</h2>
                            <button class="buttonEspecial" id="eliminar2" onclick="confirmarEliminar()">Eliminar</button>
                            <button class="buttonEspecial" id="cancelar" onclick="cancelarEliminar()">Cancelar</button>
                            <button id="aceptar" class="btnNormal" onclick="cancelarEliminar()">Acceptar</button>
                        
                    </div>
                </div>
            </div>
            <div class="first-body">
                <img class="body-images" src="img/proteina.jpg" />
                <div class="inner-first-body">

                    <button class="button" id="eliminar" onclick="eliminar()">Eliminar</button>
                   
                    <a href="editar_farmaco.php">
                        <button class="button" id="editar">Editar</button>
                    </a>
                    <h1>NOM FÀRMAC</h1>
                    <ul >
                        <li>Nom</li>
                        <li>Codi</li>
                        <li>SMILES</li>
                        <li>InChl</li>
                        <li>Data</li>
                        <li>Estat</li>
                    </ul>
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
